@extends('layout.default')

@section('body')

<style>
  .guest__detail {
    position: relative;
    /* background-image: url("/img/trong-dong.png"); */
    width: 100vw;
    height: 100vh;
    background-color: #151AA6;
    display: flex;
    flex-direction: column;
    /* z-index: -2; */
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
    /* z-index: -1; */
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
    }

    .img__body>img {
      height: 28vh;
      width: 90vw;
      object-fit: contain;
      margin: 0px 0 30px;
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
      <div>ĐẠI HỘI ĐẠI BIỂU ĐOÀN TNCS HỒ CHÍ MINH XÃ ĐA TỐN </div>
      <div>LẦN THỨ XXV, NHIỆM KỲ 2022-2027</div>
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
          <img src="{{$guest->image}}" alt="">
        </div>
      </div>
      <div class="guest__info col-12 col-md-8">
        <div class="row">
          <div class="col-12">Đồng chí <span class="text-uppercase fw-bold">{{$guest->fullname}}</span></div>

        </div>
        <div class="row">
          <div class="col-12">Đơn vị: <span>{{$guest->group->group_name}}</span></div>

        </div>
        <div class="row">
          <div class="col-3">Chức vụ</div>
          <div class="col-9">
            <div class="row">{{$guest->title1}}</div>
            <div class="row">{{$guest->title2}}</div>
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
          <div class="col-12">Trạng thái
            @if($guest->checking_status == 1)
            <span style="color:greenyellow; text-shadow: 1px 1px 2px #0f0;">ĐÃ ĐIỂM DANH</span>
            @else
            <span style="color:red; text-shadow: 1px 1px 2px #f00;">CHƯA ĐIỂM DANH</span>
            @endif
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-12">
            <a style="color:white" href="{{route('docs.index')}}"> <svg fill="white" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="padding-bottom:3px" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 61.994 61.994" style="enable-background:new 0 0 61.994 61.994;" xml:space="preserve">
                <g>
                  <g>
              ,9.998-4.484,9.998-10V24.073L54.988,23.789z M48.994,51.993c0,2.203-1.793,3.997-3.997,3.997H17
			c-2.205,0-3.999-1.794-3.999-3.997V9.999C13.001,7.794,14.794,6,17,6h10.921v11.072c0,5.514,4.486,10.001,10,10.001h11.072V51.993
			z" />
                    <path d="M54.988,23.789l-0.031-0.113c-0.025-0.193-0.07-0.38-0.135-0.572l-0.064-0.192l-0.046-0.099
			c-0.103-0.222-0.222-0.418-0.358-0.597l-0.033-0.068L33.05,0.884c-0.248-0.248-0.537-0.446-0.9-0.613l-0.253-0.094
			c-0.187-0.064-0.378-0.109-0.581-0.137L31.169,0H17C11.486,0,7,4.485,7,10v41.994c0,5.514,4.486,10,10.001,10h27.996
			c5.515,0      <path d="M14.675,34.112c0,1.291,1.046,2.337,2.337,2.337h26.487c1.291,0,2.337-1.047,2.337-2.337s-1.046-2.337-2.337-2.337H17.012
			C15.721,31.775,14.675,32.822,14.675,34.112z" />
                    <path d="M43.499,38.008H17.012c-1.291,0-2.337,1.047-2.337,2.336c0,1.291,1.046,2.338,2.337,2.338h26.487
			c1.291,0,2.337-1.047,2.337-2.338C45.836,39.055,44.79,38.008,43.499,38.008z" />
                    <path d="M43.499,44.24H17.012c-1.291,0-2.337,1.046-2.337,2.337s1.046,2.337,2.337,2.337h26.487c1.291,0,2.337-1.047,2.337-2.337
			S44.79,44.24,43.499,44.24z" />
                  </g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
                <g>
                </g>
              </svg><span>Tài liệu Đại hội</span></a>
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