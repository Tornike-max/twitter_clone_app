@props(['followersCount','ideasCount','commentsCount'])

<div class="d-flex justify-content-start">
    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
        </span> {{$followersCount}} Followers </a>
    <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
        </span> {{$ideasCount}} </a>
    <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
        </span> {{$commentsCount}} </a>
</div>