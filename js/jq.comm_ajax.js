$(function () {
  const url = "/zay/data/ajax/community_ajax.php";

  //page가 url에있는 곳으로 get값을 보낸다.
  $.get(url, {page : 1}, function (comm_data) {
    //첫번째는 url, 두번째는 get data(우리가 전달할거)
    $(".comm_row").append(comm_data);
  });
});

let current = 1;
//getPage의 n을 활용하기 위해
const pgLength = $(".num").length;
//ajax를 통해 클릭한 넘버링 데이터 불러옴
function getPage(n) {
  const url = "/zay/data/ajax/community_ajax.php";
  $('.num').removeClass("active");
  $('.num').eq(n - 1).addClass("active"); //내가 받은 n번째에게 active를 넣어줌
  //n은 0부터 시작하기 때문에 현재 n은 1이라서 마이너스해줌

  //page가 url에있는 곳으로 get값을 보낸다.
  $.get(url, { page: n }, function (comm_data) { //n이 1,2,3,4... 로 변경
    //첫번째는 url, 두번째는 get data(우리가 전달할거)
    $(".comm_row").html(comm_data);//append는 뒷쪽으로 쌓임,html로 값만 변경
    current = n;//current를 재할당해줌으로서 함수내에서도 n을 활용할 수 있음
  });
};

//이전,다음 버튼 클릭시 기능 리팩토리
function prevNext(pageNum, calcPage) {
  if (current == pageNum) {
    getPage(pageNum);
  } else {
    getPage(current + calcPage);
  }
}; 

$(".angle").click(function () {
  if ($(this).hasClass("prev")) {
    prevNext(1, -1);
  } else {
    prevNext(pgLength, 1);
  }
});

//처음으로가기, 마지막으로 가기 버튼 클릭시 기능
$(".angle-double").click(function () {
  if($(this).hasClass("first")) {
    getPage(1);
  } else {
    getPage(pgLength);
  }
});
//$(".next").click(function () {
  //prevNext(pgLength, 1);
  // if (current == pgLength) {
  //   getPage(pgLength);
  // } else {
  //   getPage(current + 1);
  // }
//});

//$(".prev").click(function () {
  //prevNext(1, -1);
  // if (current == 1) {
  //   getPage(1);
  // } else {
  //   getPage(current - 1);
  // }
//});


$('.num').eq(0).addClass("active");