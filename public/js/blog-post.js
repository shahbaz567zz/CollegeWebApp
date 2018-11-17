$('.reply-toggle').on('click', function(){
 
 var commentId = $(this).attr('data-comment-id');
 $('.comment-reply').not($('#comment-reply-'+commentId)).css('display','none');
 $('#comment-reply-'+commentId).toggle(500);
});