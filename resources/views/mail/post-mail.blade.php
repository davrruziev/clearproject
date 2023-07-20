<div>
    <h1>Hurmatli {{ $post->user->name }}</h1>
    <h3>Siz {{ $post->created_at }} da yangi post yaratdingiz</h3>
    <p>Post ID -{{ $post->id }}</p>
    <div>{{ $post->title }}</div>
    <div>{{ $post->content }}</div>
    <div>{{ $post->short_content }}</div>
    <strong>Hurmat bilan!</strong>
</div>