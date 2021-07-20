$(function () {
  
  $(".like, .unlike").click(function () {
    //클릭시 해당아이디를 분리하여 like,unlike와 상품번호로 저장
    const selectId = $(this).attr("id");
    //alert(selectId); like_12 unlike_12
    const splitId = selectId.split("_"); //_를 기준으로 나눠줌
    const likeUnlike = splitId[0]; //like or unlike
    const postId = splitId[1]; //12 (상품index)
    let type = 0;

    //console.log(likeUnlike);
    //console.log(postId);

    if (likeUnlike == "like") {
      type = 1;
    } else {
      type = 0;
    }

    //ui에 바로 반응을 주기 위해
    $.ajax({
      url: '/zay/php/like_unlike.php',
      type: 'post',
      data: { postId: postId, type: type },
      dataType:'json',
      success: function (data) {
        //console.log(data);
        const likes = data.likes;
        const unlikes = data.unlikes;

        $("#likes_" + postId).text(likes);
        $("#unlikes_" + postId).text(unlikes);

        if (type == 1) {
          $("#like_" + postId).css({
              "background": "#59ab6e",
              "color":"#fff"
          });
          $("#unlike_" + postId).css({
            "background": "#fff",
            "color": "#555"
          });
        } else {
          $("#like_" + postId).css({  
            "background": "#fff",
            "color": "#555"
          });
          $("#unlike_" + postId).css({
            "background": "#dd4545",
            "color": "#fff"
          });
        }

        // console.log(likes);
        // console.log(unlikes);

      }
    });

  });




});