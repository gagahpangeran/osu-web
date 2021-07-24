{{--
    Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
    See the LICENCE file in the repository root for full licence text.
--}}

@extends('master', [
    'titlePrepend' => $screenshot['title'],
])

@section('content')
    <div class="js-react--screenshots-show osu-layout osu-layout--full"></div>

    <script id="json-show" type="application/json">
        {!! json_encode($screenshot) !!}
    </script>

    @include('layout._react_js', ['src' => 'js/react/screenshots-show.js'])
@endsection
