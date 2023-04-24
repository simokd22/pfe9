@php
session_start();
if(!isset($_SESSION['IsInArticle'])) {
  $_SESSION['IsInArticle']=0;
}
@endphp
@extends('layouts/navbar_user')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<link rel="stylesheet" href="{{ asset('css/style_results.css') }}">
<script src="https://kit.fontawesome.com/3ac08d279f.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@endsection
@section('title' , 'results')
@section('content')
    
            <nav>
   
    
            </nav>   
         <body>>
    @if (empty($data))
    <h2 class="Error">No Results Found!!</h2>
    @else
    @php
        $index=1 ;
    @endphp
    <div class="tab-container">
        <div class="tabs">
            @foreach ( $data as $key => $innerdata )
            <div class="tab" id="{{ $index }}" > {{ $key }}</div>
            @php
            $index++ ;
            @endphp
            @endforeach
        </div>
        <div class="tab-content">
                @php
                $index=1;
                @endphp
                @foreach ($data as $key => $innerdata)
                <div class="tab-pane" id="{{ $index }}-content">
                @if (count($innerdata)==1)
                <div class="articles-container">
                    <div class="blog"><p>NO DATA FOUND</p></div>
                </div>
                @else
                <div class="articles-container">
                    @for ($i=0;$i<count($innerdata)-1;$i++)
                    <div class="blog">
                      <a href="{{ route('user.article',['news'=>$key,'id'=>$i]) }}" >
                        <img src="{{ $innerdata[$i]['image'] }}" alt="Blog Image {{ $i }}" loading="lazy" decoding="async">
                        <div class="blog-info">
                          <p class="blog-date">{{ $innerdata[$i]['date'] }}</p>
                          <p  class="blog-title">{{ $innerdata[$i]['title'] }}</p>
                        </div>
                      </a>
                    </div>
                    @endfor
                    </div>
                    <div class="pages" id="pages">
                        <table>
                          <tr>
                            <p class="page">Pages</p>
                          </tr>
                            <tr>
                                @for ($i=1;$i<=$innerdata['PagesNumber'];$i++)
                                <td><button class="page-num" data-number="{{ $i }}"> {{ $i }} </button> </td>
                                @endfor
                            </tr>
                        </table>
                    </div>
                @endif
                </div>
                @php
                $index++ ;
                @endphp
                @endforeach
        </div>
    @endif
    <script src="{{ asset('js/results.js') }}"></script>
    
</body>
@endsection