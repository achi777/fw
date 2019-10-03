<main role="main">

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">{{$randomPost[0]->title}}</h1>
            <p>{{$randomPost[0]->description}}</p>
            <p><a class="btn btn-secondary btn-lg" href="{{baseurl}}/details/{{$randomPost[0]->id}}" role="button">Learn more &raquo;</a></p>
        </div>
    </div>

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <@foreach ($postList AS $item):@>
            <div class="col-md-4">
                <h2>{{$item->title}}</h2>
                <p>{{$item->description}}</p>
                <p><a class="btn btn-secondary" href="{{baseurl}}/details/{{$item->id}}" role="button">View details &raquo;</a></p>
            </div>
            <@endforeach@>
        </div>

        <hr>
        <dir>
            {{$pagination}}
        </dir>
    </div>
    <!-- /container -->

</main>
