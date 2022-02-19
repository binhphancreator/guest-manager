@extends('layout.default')

@section('body')

<style>
  .docs a, .docs{
    color: white;
    text-shadow: 0.5px 0.5px 1px #ffffff;

  }
  .docs{
    color: white;
    height: 100vh;
    
  }
</style>

<div class="docs" style="background-color:#151AA6">

  <div>


    <h3 style="font-size: 4.5vw;color:yellow;text-align: center;overflow: visible;white-space: nowrap; padding:20px"> ĐẠI HỘI ĐẠI BIỂU <br>PHỤ NỮ HUYỆN GIA LÂM LẦN THỨ XXI <br> NHIỆM KỲ 2021 - 2026</h3>
    <script>
      function myFunction(target_id) {
        var x = document.getElementById(target_id);
        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
      }
    </script>


    <div style="text-align: justify;margin:20px;" id="123">
      <p ><a href="data/0.pdf">Sổ tay Đại biểu</a></p>
      <p ><a href="data/1.pdf">1. Chương trình Đại hội</a></p>
      <p ><a href="data/2.pdf">2. Quy chế Đại hội</a></p>
      <p ><a href="data/3.pdf">3. Quy chế bầu cử trong hệ thống Hội</a></p>
      <p  onclick="myFunction('bcct')">4. Báo cáo kết quả thực hiện Nghị quyết nhiệm kỳ 2016 - 2021; Phương hướng, nhiệm vụ nhiệm kỳ 2021 - 2026</p>

      <div id="bcct" style="display:none;">
        <div style="margin-left:15px;"><a href="data/4.pdf"> Báo cáo</a></div>
        <div style="margin-left:15px;"><a href="data/4.1.pdf"> Phụ lục</a></div>
      </div>
      <p ><a href="data/5.pdf">5. Báo cáo kiểm điểm của BCH Hội LHPN huyện khoá XX</a></p>

      <p  onclick="myFunction('y_kien')">6. Báo cáo tổng hợp ý kiến đóng góp vào dự thảo văn kiện Đại hội phụ nữ cấp trên</p>
      <div id="y_kien" style="display:none;">
        <div style="margin-left:15px;"><a href="data/6.1.pdf"> Báo cáo đóng góp ý kiến vào Dự thảo Văn kiện Trung ương</a></div>
        <div style="margin-left:15px;"><a href="data/6.2.pdf"> Báo cáo đóng góp ý kiến vào Dự thảo Văn kiện Thành phố</a></div>
      </div>



      <p  onclick="myFunction('tham_luan')">7. Các tham luận tại Đại hội</p>

      <div id="tham_luan" style="display:none;">
        <div style="margin-left:15px;"><a href="data/7.0.pdf"> Chủ đề tham luận</a></div>
        <div style="margin-left:15px;"><a href="data/7.1.pdf"> Đơn vị: Phòng LĐ-TB&amp;XH huyện</a></div>
        <div style="margin-left:15px;"><a href="data/7.2.pdf"> Đơn vị: Liên Đoàn Lao động huyện</a></div>
        <div style="margin-left:15px;"><a href="data/7.3.pdf"> Đơn vị: Đảng ủy xã Dương Xá</a></div>
        <div style="margin-left:15px;"><a href="data/7.4.pdf"> Đơn vị: Hội LHPN xã Đông Dư</a></div>
        <div style="margin-left:15px;"><a href="data/7.5.pdf"> Đơn vị: Hội LHPN xã Yên Viên</a></div>
        <div style="margin-left:15px;"><a href="data/7.6.pdf"> Đơn vị: Hội LHPN thị trấn Trâu Quỳ</a></div>
        <div style="margin-left:15px;"><a href="data/7.7.pdf"> Đơn vị: Hội LHPN thị trấn Yên Viên</a></div>
        <div style="margin-left:15px;"><a href="data/7.8.pdf"> Đơn vị: Hội LHPN xã Đặng Xá</a></div>
        <div style="margin-left:15px;"><a href="data/7.9.pdf"> Đơn vị: Hội LHPN xã Kim Lan</a></div>
        <div style="margin-left:15px;"><a href="data/7.10.pdf"> Đơn vị: Hội LHPN xã Ninh Hiệp</a></div>
        <div style="margin-left:15px;"><a href="data/7.11.pdf"> Đơn vị: Hội LHPN xã Kim Sơn</a></div>
        <div style="margin-left:15px;"><a href="data/7.12.pdf"> Đơn vị: Hội LHPN xã Phú Thị</a></div>
      </div>
      <p ><a href="data/8.pdf">8. Dự thảo Nghị quyết Đại hội</a></p>
    </div>
  </div>
</div>
@endsection