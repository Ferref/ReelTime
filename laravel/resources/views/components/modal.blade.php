<div id="messageModal" class="modal fade" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content d-flex justify-content-center">

      <div class="modal-header">
        <h5 class="modal-title">{{ $message['title'] ?? 'Title' }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body d-flex gap-3 flex-column">
        @if(Route::currentRouteName() === 'home')
          <a class="link-opacity-100" href="{{ route('watchlater') }}">Go to Watch Later</a>
        @elseif(Route::currentRouteName() === 'watchlater')
          <a class="link-opacity-100" href="{{ route('home') }}">Go to home</a>
        @endif
        <p>{{ $message['body'] ?? 'Body content goes here.' }}</p>
      </div>

    </div>
  </div>
</div>
