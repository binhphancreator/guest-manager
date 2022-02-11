@extends('layout.default')

@section('body')

<style>
  .guest__detail {
    position: relative;
    width: 100vw;
    height: 100vh;
    background-color: #151AA6;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  .gd__top {
    display: flex;
    height: 20vh;
  }

  .img__top>img {
    height: 17vh;
    margin: 3vh 4vw;
  }

  .title__top {
    padding: 0 10vw 0 5vw;
    color: white;
    font-size: 30px;
    font-weight: 900;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .line__1 {
    position: absolute;
    top: 20vh;
    left: 20vw;
    display: block;
    width: 80vw;
    height: 15px;
    background-color: orange;
    z-index: 100;
  }

  .line__2 {
    position: absolute;
    top: calc(20vh + 15px);
    left: 0;
    display: block;
    width: calc(20vw + 15px);
    height: 15px;
    background-color: greenyellow;
    z-index: 100;
  }

  .gd__body {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin: 5vh auto 30vh;
    width: 80vw;
  }

  .title__body {
    font-size: 45px;
    font-weight: 900;
    color: red;
  }

  .img__body {
    display: flex;
    justify-content: flex-end;
    margin-right: 30px;
  }

  .img__body>img {
    width: 200px;
  }

  .guest__info {
    color: white;
    font-size: 25px;
    line-height: 1.8;
  }

  .gd__bottom {
    width: 100%;
    position: absolute;
    bottom: 0;
    left: 0;
  }

  .gd__bottom>img {
    width: 100%;
    object-fit: cover;
  }

  @media only screen and (max-width: 600px) {
    .line__1,
    .line__2 {
      visibility: hidden;
    }

    .gd__top {
      flex-direction: column;
    }

    .img__top {
      height: 10vh;
      margin: auto;
    }
    .img__top>img{
      width: 10vh;
      object-fit: contain;
      height: auto;
      margin: 15px 0;
    }

    .title__top {
      font-size: 18px;
      padding: 35px 5vw;
    }

    .gd__body {
      padding: 10px 10px 15vh;
      width: 100vw;
      margin: 0;
    }

    .title__body {
      font-size: 25px;
      text-align: center;
    }

    .img__body {
      margin: 0;
      justify-content: center;
    }

    .img__body >img{
      height: 20vh;
      object-fit: contain;
      margin: 10px 0 30px;
    }

    .guest__info {
      
    color: white;
    font-size: 16px;
    line-height: 1.5;
    }

    .gd__bottom {}

    .gd__bottom {}

  }
</style>

<div class="guest__detail">
  <div class="gd__top">
    <div class="img__top">
      <img src="/img/logo.png" alt="">
    </div>
    <div class="title__top">ĐẠI HỘI ĐẠI BIỂU ĐOÀN TNCS HỒ CHÍ MINH XÃ ĐA TỐN LẦN THỨ XXV, NHIỆM KỲ 2022-2027</div>
  </div>
  <div class="line__1"></div>
  <div class="line__2"></div>
  <div class="gd__body">
    <div class="title__body">
      NHIỆT LIỆT CHÀO MỪNG ĐẠI BIỂU
    </div>
    <div class="content__body row w-100 pt-4">
      <div class="col-12 col-md-4">
        <div class="img__body">
          <img src="{{$guest->image}}" alt="">
        </div>
      </div>
      <div class="guest__info col-12 col-md-8">
        <div class="row">
          <div class="col-12">Đồng chí <span class="text-uppercase ms-5 ">{{$guest->fullname}}</span></div>

        </div>
        <div class="row">
          <div class="col-12">Đơn vị <span class="ms-4">{{$guest->group->group_name}}</span></div>

        </div>
        <div class="row">
          <div class="col-3">Chức vụ</div>
          <div class="col-9">
            <div class="row">{{$guest->title1}}</div>
            <div class="row">{{$guest->title2}}</div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            Chỗ ngồi phiên 1: {{$guest->seat1}}
          </div>
          <div class="col-6">
            Chỗ ngồi phiên 1: {{$guest->seat2}}
          </div>
        </div>
        <div class="row">
          <div class="col-12">Trang thái
            @if($guest->checking_status == 1)
            <span style="color:greenyellow">ĐÃ ĐIỂM DANH</span>
            @else
            <span style="color:red">CHƯA ĐIỂM DANH</span>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="gd__bottom">
    <img src="/img/hoa sen.png" alt="">
  </div>
</div>



@endsection