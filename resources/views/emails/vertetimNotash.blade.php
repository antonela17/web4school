<!DOCTYPE>
<html>
<style>
    body{

        margin: 0;

        background-color: bisque;

    }

    .index {

        align-items: center;

        justify-content: center;

    }

    .index .top img{

        justify-content: center;

        width: 65px;

        display: block;

        margin-left: auto;

        margin-right: auto;

        margin-top: 61px;

    }

    .index .top h2{

        justify-content: center;

        align-items: center;

        text-align: center;

    }
    .index .bottom p{

        font-size: 17px;

        margin-top: 70px;

    }
    .bottom{

        justify-content: center;

        align-items: center;

        text-align: center;

        margin-left: 60px;

        margin-right: 60px;

    }

</style>
<title>Document</title>
<body>
<div class="index">
    <div class="top">
        <h2 >
            REPUBLIKA E SHQIPERISE <br>
            SHKOLLA WEB4SCHOOL <br>
            DEGA MESIMORE<br>
        </h2>
    </div>
    <div class="bottom">
        <h3>VERTETIM</h3>
        <p> Vertetohet se <b>{!! $user['name'] !!} {!! $user['surname'] !!}</b>, vazhdon mesimet ne shkollen "Web4School" , sistemi me kohe
            te plote. Ne baze te Regjistrimit themeltar
            te notave te Deges Mesimore te Fakultetit te Shkencave te Natyres, rezulton se ka shlyer keto detyrime me vleresimet perkatese:
        </p>
    </div>
    <div class="row">

        <table align='center' cellspacing=2 cellpadding=5 id="data_table" border=1>
            <tr>
                <th>Nr</th>
                <th>Lenda</th>
                <th>Nota</th>
            </tr>

            @foreach($grades as $grade)
                <tr id="row2">
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{$grade['name']}}</td>
                    <td>{{$grade['grade']}}</td>
                </tr>
            @endforeach

        </table>

    </div>
</div>
</body>
</html>
