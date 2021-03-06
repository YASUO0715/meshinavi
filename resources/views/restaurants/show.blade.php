@extends('layouts.main')

@section('title', '詳細画面')

@section('content')
@include('partial.restaurant')
    <table class="table-bordered mb-5 mt-3">
        <colgroup span="1" style="width:200px;background-color:#efefef;"></colgroup>
        <tbody>
            <tr>
                <th>店名</th>
                <td>
                    <p>{{ $restaurant->name }}</p>
                    <p>{{ $restaurant->name_kana }}</p>
                </td>
            </tr>
            <tr>
                <th>住所</th>
                <td>{{ $restaurant->address }}</td>
            </tr>
            <tr>
                <th>営業時間</th>
                <td>{{ $restaurant->opentime }}</td>
            </tr>
            <tr>
                <th>定休日</th>
                <td>{{ $restaurant->holiday }}</td>
            </tr>
            <tr>
                <th>その他</th>
                <td>{{ $restaurant->note }}</td>
            </tr>
        </tbody>
    </table>
    <div id="map" style="height: 30vh"></div>
    <a href="{{ route('restaurants.index')}}">戻る</a>
@endsection
@section('script')
    @include('partial.map')
    <script>
        L.marker([{{ $restaurant->latitude }},{{ $restaurant->longitude }}])
            .bindPopup("{{ $restaurant->name }}", {closeButton: false})
            .addTo(map);
    </script>
@endsection
