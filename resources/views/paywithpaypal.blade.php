<html>
<head>
    <meta charset="utf-8">
    <title>Pay with Paypal</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="flex items-center justify-between mb-6">

            </div>
            <div class="panel panel-default" style="margin-top: 60px;">

                @if ($message = session()->get('success'))
                    <div class="custom-alerts alert alert-success fade in">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                        {!! $message !!}
                    </div>
                    <?php session()->forget('success');?>
                @endif

                @if ($message = session()->get('error'))
                    <div class="custom-alerts alert alert-danger fade in">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                        {!! $message !!}
                    </div>
                    <?php session()->forget('error');?>
                @endif
                <div class="panel-heading">
                    <span ><div class="flex flex-wrap items-center" style="padding-left: 670px">
                        <a href="/home" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded">
                            <span class="ml-2 text-xs font-semibold">Back</span>
                        </a>
                    </div></span><b>Paywith Paypal
                        <br>Vlera e ketij Vertetimi eshte 3.00 USD($)</b>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{!! URL::route('paypal') !!}" >
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            {{--                            <label for="amount" class="col-md-4 control-label">Vlera e ketij vertetimi eshte 3.00 USD</label>--}}

                            <div class="col-md-6">
                                <input id="amount" type="hidden" class="form-control" name="amount" value="{{--{{ old('amount') }}--}}3" autofocus>

                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Paywith Paypal
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
