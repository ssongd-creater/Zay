$(function () {
  let fileTarget = $(".upload_hidden");

  fileTarget.on("change", function () {
    //change 이벤트는 input 의 변화되는 값을 읽어옴
    let filename;
    if (window.FileReader) {
      filename = $(this)[0].files[0].name;
    } else {
      filename = $(this).val().split("/").pop().split("\\").pop();
    }

    $(this).siblings(".upload_name").val(filename); //siblings는 형제태그를 말함
  });

  $("#pro_img_1").on("change", img1FileSelect1);
  $("#pro_img_2").on("change", img1FileSelect2);
});

const img1FileSelect1 = function (e) {
  const input = e.target;
  const reader = new FileReader();

  console.log(reader);

  reader.onload = function () {
    const dataURL = reader.result;
    const output = document.querySelector("#img1");
    output.src = dataURL;
  };
  reader.readAsDataURL(input.files[0]);
};

const img1FileSelect2 = function (e) {
  const input = e.target;
  const reader = new FileReader();

  console.log(reader);

  reader.onload = function () {
    const dataURL = reader.result;
    const output = document.querySelector("#img2");
    output.src = dataURL;
  };
  reader.readAsDataURL(input.files[0]);
};
