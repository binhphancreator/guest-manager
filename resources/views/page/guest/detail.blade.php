@extends('layout.default')

@section('body')

<style>
  body {
    background-color: #151AA6;
  }

  .guest__detail {
    position: relative;
    /* background-image: url("/img/trong-dong.png"); */
    width: 100vw;
    height: 100vh;
    /* background-color: #151AA6; */
    display: flex;
    flex-direction: column;
    overflow: auto;
  }


  .bg__img {
    background-image: url("/img/trong-dong.png");
    opacity: 0.25;
    position: fixed;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    z-index: -1;
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
    padding-right: 10vw;
    margin: auto;
    color: white;
    font-size: 2vw;
    font-weight: 900;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    text-shadow: 1px 1px 2px #ffffff;
  }

  .line__1 {
    position: absolute;
    top: 20vh;
    left: 20vw;
    display: block;
    width: 80vw;
    height: 15px;
    background-image: linear-gradient(to right, #ed9b28, #eabd4e);
    z-index: 100;
  }

  .line__1::after {
    position: absolute;
    content: "";
    top: 0;
    left: -20px;
    width: 0;
    height: 0;
    border-bottom: 15px solid #c55a11;
    border-left: 20px solid transparent;
  }

  .line__2 {
    position: absolute;
    top: calc(20vh + 15px);
    left: 0;
    display: block;
    width: calc(20vw - 20px);
    height: 15px;
    background-image: linear-gradient(to right, #61944a, #addd98);
    z-index: 100;
  }

  .line__2::after {
    position: absolute;
    content: "";
    top: 0;
    right: -20px;
    width: 0;
    height: 0;
    border-top: 15px solid #468c27;
    border-right: 20px solid transparent;
  }

  .gd__body {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin: 8vh auto;
    width: 90vw;
  }

  .title__body {
    font-size: 3vw;
    font-weight: 900;
    color: red;
    text-shadow: 2px 2px 4px #FF0000;
  }

  .img__body {
    display: flex;
    justify-content: flex-end;
    margin-right: 30px;
  }

  .img__body>img {
    width: 20vw;
    height: 40vh;
    object-fit: contain;
  }

  .guest__info {
    color: white;
    font-size: 1.8vw;
    font-weight: 500;
    line-height: 1.8;
    text-shadow: 1px 1px 2px #ffffff;
  }

  .gd__bottom {
    width: 100%;
    position: absolute;
    bottom: 0;
    left: 0;
    z-index: -1;
  }

  .gd__bottom>img {
    width: 100%;
    object-fit: cover;
  }

  @media only screen and (max-width: 600px) {

    .line__1,
    .line__2,
    .gd__bottom {
      visibility: hidden;
    }

    .gd__top {
      flex-direction: column;
    }

    .img__top {
      height: 10vh;
      margin: auto;
    }

    .img__top>img {
      width: 10vh;
      object-fit: contain;
      height: auto;
      margin: 8px 0;
    }

    .title__top {
      font-size: 3.3vw;
      padding: 10px 5vw;
      text-shadow: 0.5px 0.5px 1px #ffffff;
    }

    .gd__body {
      padding: 3vh 10px;
      width: 100vw;
      margin: 0;
    }

    .title__body {
      font-size: 5.5vw;
      text-align: center;

      text-shadow: 1px 1px 2px #FF0000;
    }

    .img__body {
      margin: 0;
      justify-content: center;
      height: 28vh;
      width: 90vw;
      margin: 0px 0 30px;
    }

    .img__body>img {
      height: 28vh;
      width: 90vw;
      object-fit: contain;
    }

    .guest__info {
      color: white;
      font-size: 4vw;
      line-height: 1.5;
      text-shadow: 0.5px 0.5px 1px #ffffff;
    }


  }
</style>

<div class="guest__detail">
  <div class="bg__img">
  </div>
  <div class="gd__top">
    <div class="img__top">
      <img src="/img/logo.png" alt="">
    </div>
    <div class="title__top">
      <div>ĐẠI HỘI ĐẠI BIỂU ĐOÀN TNCS HỒ CHÍ MINH XÃ KIM SƠN </div>
      <div>LẦN THỨ XXIV, NHIỆM KỲ 2022-2027</div>
    </div>
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
          @if($guest->image)
          <img src="{{$guest->image}}" alt="">
          @endif
        </div>
      </div>
      <div class="guest__info col-12 col-md-8">
        <div class="row">
          <div class="col-12">Đồng chí <span class="text-uppercase fw-bold">{{$guest->fullname}}</span></div>

        </div>
        <div class="row">
          <div class="col-12">Đơn vị: <span>{{$guest->group->group_name}}</span></div>

        </div>
        <div class="d-flex flex-wrap">
          <p class="mb-0">Chức vụ:&nbsp;</p>
          <div>
            <p class="mb-0">{{$guest->title1}}</p>
            @if($guest->title2)
            <p class="mb-0">{{$guest->title2}}</p>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-md-6">
            Chỗ ngồi phiên 1: <span>@if($guest->seat1)
              {{$guest->seat1}}
              @else
              {{"-"}}
              @endif</span>
          </div>
          <div class="col-12 col-md-6">
            Chỗ ngồi phiên 2: <span>@if($guest->seat2)
              {{$guest->seat2}}
              @else
              {{"-"}}
              @endif</span>
          </div>
        </div>
        <div class="row">
          <div class="col-12">Trạng thái:
            @if($guest->checking_status == 1)
            <span style="color:greenyellow">ĐÃ ĐIỂM DANH</span>
            @else
            <span style="color:red;">CHƯA ĐIỂM DANH</span>
            @endif
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-12">
            <a style="color:white" href="{{route('docs.index')}}">
              <svg style="width: 24px; height: 24px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-font-fill" viewBox="0 0 16 16">
                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM5.057 6h5.886L11 8h-.5c-.18-1.096-.356-1.192-1.694-1.235l-.298-.01v5.09c0 .47.1.582.903.655v.5H6.59v-.5c.799-.073.898-.184.898-.654V6.755l-.293.01C5.856 6.808 5.68 6.905 5.5 8H5l.057-2z" />
              </svg>
              <span>Tài liệu Đại hội</span>
            </a>
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