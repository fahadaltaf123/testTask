Hello <i>{{ $post->receiver }}</i>,
<p>This is a demo email for testing purposes!</p>
  
<p><u>Post Created!</u></p>
  
<div>
<p><b>Post Title:</b>&nbsp;{{ $title }}</p>
<p><b>Post Body:</b>&nbsp;{{ $body }}</p>
</div>
  
Thank You,
<br/>
<i>{{ $post->sender }}</i>