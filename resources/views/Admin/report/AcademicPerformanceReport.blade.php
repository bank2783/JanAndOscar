<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ใบแจ้งหนี้</title>
    @livewireStyles
</head>

<style>
    @font-face {
            font-family: 'sarabun';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'sarabun-bold';
            font-style: normal;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew-Bold.ttf') }}") format('truetype');
        }

        body {
            font-family: 'sarabun', 'sarabun-bold', sans-serif;
            font-size: 20px;
            margin: 0;
            padding: 0;
            line-height: 1;
        }
        .header{
            display:grid;
            grid-template-columns: 1fr 1fr 1fr;
            
        }
        .janandoscar-text{
            margin-top: 50px;
            color: #e02b20;
            font-weight: bold;
        }
        .date{
            margin-top: 50px;
            justify-content: end;
            display: flex;
        }
        .detail-container{
            padding: 50px;
        }
        .name{
            color:grey
        }
        .bachelor-content{
            margin-top:20px
        }
        .school-content{
            margin-top:20px
        }
        .academic-performance-content{
            display: flex;
            justify-content: center;
        }
        .academic-performance-image{
            width: 500px;
            height: 100%;
        }

</style>
<body>
    @livewireScripts
    <div>
        <div class="header">
            <div>
                
                
                <img class="" src="{{$base64logo}}" alt="Logo">


            </div>
            <div class="janandoscar-text">
                <span>JanAndOscar Report Academic Performance Report</span>
            </div>
            <div class="date">
                <span > date 07/04/2025</span>
            </div>
            
        </div>
        <hr>
        <div class="detail-container">
            <div>
                <label for="">Name</label>
                <div class="name">{{$student_data->student_name}}</div>
            </div>
            <div class="bachelor-content">
                <label for="">Term</label>
                <div class="name">{{ $academic_performance->annotation}}</div>
            </div>
            
        </div>
        <hr>
        <div class="">
            <div class="academic-performance-content">
                <img class="academic-performance-image" src="{{$academic_performance_base64}}" alt="">
            </div>
        </div>
    </div>
    
</body>
</html>
