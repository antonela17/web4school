<?php


namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Dotenv\Validator;
    use Illuminate\Support\Facades\URL;

    use Symfony\Component\HttpFoundation\Session\Session;
    use Illuminate\Support\Facades\Redirect;
    use Symfony\Component\Console\Input\Input;
    use PayPal\Rest\ApiContext;
    use PayPal\Auth\OAuthTokenCredential;
    use PayPal\Api\Amount;
    use PayPal\Api\Details;
    use PayPal\Api\Item;
    use PayPal\Api\ItemList;
    use PayPal\Api\Payer;
    use PayPal\Api\Payment;
    use PayPal\Api\RedirectUrls;
    use PayPal\Api\ExecutePayment;
    use PayPal\Api\PaymentExecution;
    use PayPal\Api\Transaction;

class PayPalController extends Controller
{
    private $_api_context;

    public function __construct()
    {

        $paypal_configuration = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_configuration['client_id'], $paypal_configuration['secret']));
        $this->_api_context->setConfig($paypal_configuration['settings']);
    }

    public function payWithPaypal()
    {
        return view('paywithpaypal');
    }

    public function postPaymentWithpaypal(Request $request)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();

        $item_1->setName('Vertetim Notash')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->get('amount'));

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->get('amount'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Enter Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('status'))
            ->setCancelUrl(URL::route('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        try {
            $payment->create($this->_api_context);
        } catch (\Exception $e) {

            return Redirect::route('paywithpaypal');
        }


        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        session()->put('paypal_payment_id', $payment->getId());

        if (isset($redirect_url)) {
            return Redirect::away($redirect_url);
        }

        session()->put('error', 'Unknown error occurred');
        return Redirect::route('paywithpaypal');
    }

    public function getPaymentStatus(Request $request)
    {
        $payment_id = session()->get('paypal_payment_id');

        session()->forget('paypal_payment_id');
        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            session()->put('error', 'Payment failed');
            return Redirect::route('paywithpaypal');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {
            session()->put('success', 'Payment success !!');
            return Redirect::route('email.paypal');
        }

        session()->put('error', 'Payment failed !!');
        return Redirect::route('paywithpaypal');
    }
}


