<li class="notification notification-unread">
    <a href="#">
        <div class="image"><img src="assets/img/avatar2.png" alt="Avatar"></div>
        <div class="notification-info">
            <div class="text"><span class="user-name">Annoucement!</span> {{ $notification->data['title'] }} - {{ $notification->data['body'] }}</div>
            <span class="date">{{ $notification->created_at->diffForHumans() }}</span>
        </div>
    </a>
</li>