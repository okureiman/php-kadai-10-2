<!DOCTYPE html>
<!--課題-->
@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール作成画面</h2>
                <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">
                    
                    @if (count($errors) > 0)
                    <ul>
                    @foreach($errors ->all() as $e)
                        
                    <li>{{ $e }}</li>
                    @endforeach
                    </ul>
                    @endif
                    
                    <div class="form-group row">
                        <label class="col-md-2">氏名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">性別</label>
                        <input type="radio" name="gender" value="man"><b>男性</b>
　　　　　　　　　　    <input type="radio" name="gender" value="woman"><b>女性</b>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">趣味</label>
                        <div class="col-md-10">
                          <input type="text" class="form-control" name="hobby" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2">自己紹介欄</label>
                      <div class="col-md-10">
                         <textarea class="form-control" name="introduction" rows="20">{{ old('body') }}</textarea>
                      </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="update">
                </form>
            </div>
        </div>
    </div>
@endsection