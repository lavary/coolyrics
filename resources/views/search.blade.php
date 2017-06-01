@extends('layouts.basic')

@section('content')

<div id="header">
    <div class="col-md-2"><h1>Coolyrics</h1></div>
    <div class="col-md-6">
                  
          <div class="input-group" id="search-box">
             <div class="input-group-btn">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span>Genre</span>
              <span class="caret"></span></button>
              <ul id="genres" class="dropdown-menu">
                
              </ul>
            </div><!-- /btn-group -->
          </div>          

    </div>
    <div  id="login-link" class="col-md-4 text-right">
            <a href="{{route('login')}}">Login</a>
    </div>
</div>

<div class="container-fluid">
    <div id="hits-container"></div>
    <div id="pagination-container"></div>
</div>

@endsection

@section('scripts')
    
<!-- Scripts -->
@parent    
<script language="javascript" src="https://cdn.jsdelivr.net/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.js"></script>
@endsection

@section('javascript')

<script type="text/javascript" id="hits-temp">
    
    <div class="row song">
        <div class="pull-left band-thumbnail" style="background-image: url(/storage/artists/@{{photo}});"></div> 
        <a class="song-link" href="song/@{{objectID}}">@{{{_highlightResult.title.value}}}</a>
        <span class="song-artist">- <a href="?q=@{{artist}}&hPP=20&idx=songs&p=0&is_v=1">@{{artist}}</a> (@{{album}})</span>
        <span class="song-youtube-link"><a href="@{{youtube_link}}" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-play"></i> Watch on Youtube</a></span>
    </div>

</script>

<span></span>


<script>
  var search = instantsearch({
    appId: 'XI8PV16IK6',
    apiKey: '63c96991d445cb2de4fff316ac909c1a',
    indexName: 'songs',
    urlSync: true
  });

  search.addWidget(
    instantsearch.widgets.searchBox({
      container: '#search-box',
      placeholder: 'Search by artist, song, or lyrics',
      wrapInput: false,
      cssClasses: {
        input: 'form-control'
      }
    })
  );

  search.addWidget(
    instantsearch.widgets.hits({
      container: '#hits-container',
      templates: {
        item: $('#hits-temp').html(),
        empty: 'No lyrics was found! <p>We will be adding more lyrics to the database.</p>',
        header: '<h2>Lyrics</h2>'
      }
    })
  );

  search.addWidget(
    instantsearch.widgets.hits({
      container: '#hits-container',
      templates: {
        item: $('#hits-temp').html(),
        empty: 'No lyrics was found! <p>We will be adding more lyrics to the database.</p>',
        header: '<h2>Lyrics</h2>'
      }
    })
  );

  search.addWidget(
    instantsearch.widgets.menu({
      container: '#genres',
      attributeName: 'genres',
      limit: 10,
      templates: {
          header: '',
          footer: '',
          item: '<li><a href="@{{url}}">@{{name}}</></li>'
      }
    })
  );


  search.addWidget(
    instantsearch.widgets.pagination({
      container: '#pagination-container'
    })
  );

  search.start();
</script>

@endsection
