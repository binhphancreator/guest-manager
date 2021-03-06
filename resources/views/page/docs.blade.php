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
            min-height: 100vh;
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

    </style>
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

    <div class="guest__detail">
        <div class="bg__img">
        </div>
        <div class="gd__top">
            <div class="img__top">
                <img src="/img/logo.png" alt="">
            </div>
            <div class="title__top">
                <div>?????I H???I ?????I BI???U ??O??N TNCS H??? CH?? MINH X?? KIM S??N </div>
                <div>L???N TH??? XXIV, NHI???M K??? 2022-2027</div>
            </div>
        </div>
        <div class="line__1"></div>
        <div class="line__2"></div>
        <div class="gd__body">
            <div class="title__body text-uppercase">
                V??n b???n ?????i h???i
            </div>
            <div class="text-white" style="text-align: justify;margin:20px; padding-bottom:20px" id="123">
                <p><a class="text-white" href="/assets/0.pdf">S??? tay ?????i bi???u</a></p>
                <p><a class="text-white" href="/assets/1.pdf">1. Ch????ng tr??nh ?????i h???i</a></p>
                <p><a class="text-white" href="/assets/2.pdf">2. Quy ch??? ?????i h???i</a></p>
                <p><a class="text-white" href="/assets/3.pdf">3. Quy ch??? b???u c??? trong h??? th???ng H???i</a></p>
                <p style="cursor:pointer" onclick="myFunction('bcct')">4. B??o c??o k???t qu??? th???c hi???n Ngh??? quy???t nhi???m k??? 2016
                    - 2021; Ph????ng h?????ng, nhi???m v??? nhi???m k??? 2021 - 2026</p>

                <div id="bcct" style="display:none; padding-bottom:20px">
                    <div style="margin-left:15px;"><a class="text-white" href="/assets/4.pdf"> B??o c??o</a></div>
                    <div style="margin-left:15px;"><a class="text-white" href="/assets/4.1.pdf"> Ph??? l???c</a></div>
                </div>
                <p><a class="text-white" href="/assets/5.pdf">5. B??o c??o ki???m ??i???m c???a BCH H???i LHPN huy???n kho?? XX</a></p>

                <p style="cursor:pointer" onclick="myFunction('y_kien')">6. B??o c??o t???ng h???p ?? ki???n ????ng g??p v??o d??? th???o v??n
                    ki???n ?????i h???i ph??? n??? c???p tr??n</p>
                <div id="y_kien" style="display:none; padding-bottom:20px">
                    <div style="margin-left:15px;"><a class="text-white" class="text-white" href="/assets/6.1.pdf"> B??o c??o ????ng g??p ?? ki???n v??o D??? th???o V??n ki???n
                            Trung ????ng</a></div>
                    <div style="margin-left:15px;"><a class="text-white" class="text-white"class="text-white" href="/assets/6.2.pdf"> B??o c??o ????ng g??p ?? ki???n v??o D??? th???o V??n ki???n
                            Th??nh ph???</a></div>
                </div>



                <p style="cursor:pointer" onclick="myFunction('tham_luan')">7. C??c tham lu???n t???i ?????i h???i</p>

                <div id="tham_luan" style="display:none; padding-bottom:20px">
                    <div style="margin-left:15px;"><a class="text-white" href="/assets/7.0.pdf"> Ch??? ????? tham lu???n</a></div>
                    <div style="margin-left:15px;"><a class="text-white" href="/assets/7.1.pdf"> ????n v???: Ph??ng L??-TB&amp;XH huy???n</a></div>
                    <div style="margin-left:15px;"><a class="text-white" href="/assets/7.2.pdf"> ????n v???: Li??n ??o??n Lao ?????ng huy???n</a></div>
                    <div style="margin-left:15px;"><a class="text-white" href="/assets/7.3.pdf"> ????n v???: ?????ng ???y x?? D????ng X??</a></div>
                    <div style="margin-left:15px;"><a class="text-white" href="/assets/7.4.pdf"> ????n v???: H???i LHPN x?? ????ng D??</a></div>
                    <div style="margin-left:15px;"><a class="text-white" href="/assets/7.5.pdf"> ????n v???: H???i LHPN x?? Y??n Vi??n</a></div>
                    <div style="margin-left:15px;"><a class="text-white" href="/assets/7.6.pdf"> ????n v???: H???i LHPN th??? tr???n Tr??u Qu???</a></div>
                    <div style="margin-left:15px;"><a class="text-white" href="/assets/7.7.pdf"> ????n v???: H???i LHPN th??? tr???n Y??n Vi??n</a></div>
                    <div style="margin-left:15px;"><a class="text-white" href="/assets/7.8.pdf"> ????n v???: H???i LHPN x?? ?????ng X??</a></div>
                    <div style="margin-left:15px;"><a class="text-white" href="/assets/7.9.pdf"> ????n v???: H???i LHPN x?? Kim Lan</a></div>
                    <div style="margin-left:15px;"><a class="text-white" href="/assets/7.10.pdf"> ????n v???: H???i LHPN x?? Ninh Hi???p</a></div>
                    <div style="margin-left:15px;"><a class="text-white" href="/assets/7.11.pdf"> ????n v???: H???i LHPN x?? Kim S??n</a></div>
                    <div style="margin-left:15px;"><a class="text-white" href="/assets/7.12.pdf"> ????n v???: H???i LHPN x?? Ph?? Th???</a></div>
                </div>
                <p><a class="text-white" href="/assets/8.pdf">8. D??? th???o Ngh??? quy???t ?????i h???i</a></p>
            </div>
        </div>
        <div class="gd__bottom">
            <img src="/img/hoa sen.png" alt="">
        </div>
    </div>
@endsection
