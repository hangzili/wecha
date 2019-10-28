<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<table border="2">
    <tr>
        <td>用户名</td>
        <td></td>
        <td>性别</td>
        <td>国家</td>
        <td>头像</td>
        <td>关注日期</td>
    </tr>
    @foreach($lists as $v)
        <tr>
            <td>{{ $v['nickname'] }}</td>
            <td>{{$v['openid']}}</td>
            <td>@if($v['sex']==1)男@else女@endif</td>
            <td>{{$v['country']}}</td>
            <td><img src="{{$v['headimgurl']}}"></td>
            <td>{{date('Y-m-d',$v['subscribe_time'])}}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
