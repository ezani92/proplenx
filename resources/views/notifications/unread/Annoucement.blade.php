<li class="notification notification-unread">
    <a href="#">
        <div class="image"><img src="{{ secure_asset('assets/img/annoucement.png') }}" alt="Avatar"></div>
        <div class="notification-info">
            <div class="text"><span class="user-name">Annoucement!</span> {{ $notification->data['title'] }} - {{ $notification->data['body'] }}</div>
            <span class="date">{{ $notification->created_at->diffForHumans() }}</span>
        </div>
    </a>
</li>