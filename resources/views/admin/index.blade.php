@extends("admin.layouts.master")

@section('content')



 <!-- Content Wrapper. Contains page content -->





    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ $page_title }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container">
      <div class="ag-format-container">
        <div class="ag-courses_box">
          <div class="ag-courses_item">
            <a href="#" class="ag-courses-item_link">
              <div class="ag-courses-item_bg"></div>

              <div class="ag-courses-item_title">
                Posts
              </div>

              <div class="ag-courses-item_date-box">

                <span class="ag-courses-item_date">
                  {{ $totalPosts }}
                </span>
              </div>
            </a>
          </div>

          <div class="ag-courses_item">
            <a href="#" class="ag-courses-item_link">
              <div class="ag-courses-item_bg"></div>

              <div class="ag-courses-item_title">
                Notices
              </div>

              <div class="ag-courses-item_date-box">

                <span class="ag-courses-item_date">

                </span>
              </div>
            </a>
          </div>

          <div class="ag-courses_item">
            <a href="#" class="ag-courses-item_link">
              <div class="ag-courses-item_bg"></div>

              <div class="ag-courses-item_title">
                Contact Requests
              </div>

              <div class="ag-courses-item_date-box">

                <span class="ag-courses-item_date">
                  {{ $totalContact }}
                </span>
              </div>
            </a>
          </div>

          <div class="ag-courses_item">
            <a href="#" class="ag-courses-item_link">
              <div class="ag-courses-item_bg"></div>

              <div class="ag-courses-item_title">
                Team Member
              </div>

              <div class="ag-courses-item_date-box">

                <span class="ag-courses-item_date">
                  {{ $totalTeam }}
                </span>
              </div>
            </a>
          </div>

          <div class="ag-courses_item">
            <a href="#" class="ag-courses-item_link">
              <div class="ag-courses-item_bg"></div>

              <div class="ag-courses-item_title">
                Executive Members
              </div>

              <div class="ag-courses-item_date-box">

                <span class="ag-courses-item_date">
                  {{ $totalExecutives }}
                </span>
              </div>
            </a>
          </div>

          <div class="ag-courses_item">
            <a href="#" class="ag-courses-item_link">
              <div class="ag-courses-item_bg"></div>

              <div class="ag-courses-item_title">
                Committee Members
              </div>

              <div class="ag-courses-item_date-box">

                <span class="ag-courses-item_date">
                  {{ $totalCommittee }}
                </span>
              </div>

            </a>
          </div>
{{--
          <div class="ag-courses_item">
            <a href="#" class="ag-courses-item_link">
              <div class="ag-courses-item_bg">
              </div>
              <div class="ag-courses-item_title">
                Digital Marketing
              </div>
            </a>
          </div>

          <div class="ag-courses_item">
            <a href="#" class="ag-courses-item_link">
              <div class="ag-courses-item_bg"></div>

              <div class="ag-courses-item_title">
                Interior Design
              </div>

              <div class="ag-courses-item_date-box">
                Start:
                <span class="ag-courses-item_date">
                  31.10.2022
                </span>
              </div>
            </a>
          </div> --}}

        </div>
      </div>
    </div>


  <style>

/* For the cards in the dashboard */
.ag-courses_box {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: start;
    -ms-flex-align: start;
    align-items: flex-start;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;

    padding: 50px 0;
  }
  .ag-courses_item {
    -ms-flex-preferred-size: calc(33.33333% - 30px);
    flex-basis: calc(33.33333% - 30px);

    margin: 0 15px 30px;

    overflow: hidden;

    border-radius: 28px;
  }
  .ag-courses-item_link {
    display: block;
    padding: 30px 20px;
    background-image: linear-gradient(-45deg, rgba(0, 160, 255, 0.86), #0048a2),url(../img/generic/bg-navbar.png);

    overflow: hidden;

    position: relative;
  }
  .ag-courses-item_link:hover,
  .ag-courses-item_link:hover .ag-courses-item_date {
    text-decoration: none;
    color: #FFF;
  }
  .ag-courses-item_link:hover .ag-courses-item_bg {
    -webkit-transform: scale(10);
    -ms-transform: scale(10);
    transform: scale(10);
  }
  .ag-courses-item_title {
    min-height: 87px;
    margin: 0 0 25px;

    overflow: hidden;

    font-weight: bold;
    font-size: 30px;
    color: #FFF;

    z-index: 2;
    position: relative;
  }
  .ag-courses-item_date-box {
    font-size: 18px;
    color: #FFF;

    z-index: 2;
    position: relative;
  }
  .ag-courses-item_date {
    font-weight: bold;
    color: #f9b234;

    -webkit-transition: color .5s ease;
    -o-transition: color .5s ease;
    transition: color .5s ease
  }
  .ag-courses-item_bg {
    height: 128px;
    width: 128px;
    background-color: #f9b234;

    z-index: 1;
    position: absolute;
    top: -75px;
    right: -75px;

    border-radius: 50%;

    -webkit-transition: all .5s ease;
    -o-transition: all .5s ease;
    transition: all .5s ease;
  }
  .ag-courses_item:nth-child(2n) .ag-courses-item_bg {
    background-color: #3ecd5e;
  }
  .ag-courses_item:nth-child(3n) .ag-courses-item_bg {
    background-color: #e44002;
  }
  .ag-courses_item:nth-child(4n) .ag-courses-item_bg {
    background-color: #952aff;
  }
  .ag-courses_item:nth-child(5n) .ag-courses-item_bg {
    background-color: #cd3e94;
  }
  .ag-courses_item:nth-child(6n) .ag-courses-item_bg {
    background-color: #4c49ea;
  }



  @media only screen and (max-width: 979px) {
    .ag-courses_item {
      -ms-flex-preferred-size: calc(50% - 30px);
      flex-basis: calc(50% - 30px);
    }
    .ag-courses-item_title {
      font-size: 24px;
    }
  }

  @media only screen and (max-width: 767px) {
    .ag-format-container {
      width: 96%;
    }

  }
  @media only screen and (max-width: 639px) {
    .ag-courses_item {
      -ms-flex-preferred-size: 100%;
      flex-basis: 100%;
    }
    .ag-courses-item_title {
      min-height: 72px;
      line-height: 1;

      font-size: 24px;
    }
    .ag-courses-item_link {
      padding: 22px 40px;
    }
    .ag-courses-item_date-box {
      font-size: 16px;
    }
  }
  </style>


  @stop
