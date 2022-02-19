@extends('layouts.app')
@section('content')

    @php
        /**
        * @var \App\Models\Profile $profile
        */
    @endphp

    <link rel="stylesheet" href="/css/cropper.css" crossorigin="anonymous">

    <div class="card">
        <div class="d-flex justify-content-between m-3">
            <a href="{{ route('edit.profile', $profile->id) }}" title="">
                <svg style="height: 30px" aria-hidden="true" focusable="false" data-prefix="fa-light" data-icon="user-pen" class="svg-inline--fa fa-user-pen fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M625.9 234.2l-28.13-28.14c-9.373-9.373-21.66-14.06-33.94-14.06s-24.57 4.688-33.94 14.06l-175.5 175.5c-8.936 8.936-15.03 20.32-17.5 32.71l-16.66 83.35C318.7 505.2 324.6 512 331.1 512c.7852 0 1.586-.0781 2.398-.2402l83.35-16.67c12.39-2.479 23.77-8.566 32.7-17.5l175.5-175.5C644.7 283.3 644.7 252.9 625.9 234.2zM427.8 454.1c-4.48 4.48-10.13 7.506-16.35 8.748L357.5 474.5l10.78-53.93c1.244-6.219 4.27-11.88 8.754-16.36l114.3-114.3l50.76 50.76L427.8 454.1zM603.3 279.5l-38.62 38.62l-50.76-50.76l38.62-38.62c4.076-4.076 8.838-4.686 11.31-4.686s7.236 .6094 11.31 4.686l28.13 28.14C607.4 260.9 608 265.7 608 268.1C608 270.6 607.4 275.4 603.3 279.5zM223.1 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 223.1 256zM223.1 32c52.94 0 96 43.06 96 96c0 52.93-43.06 96-96 96s-96-43.07-96-96C127.1 75.06 171.1 32 223.1 32zM272.5 480H34.66C33.21 480 32 478.8 32 477.3C31.99 399.4 95.4 336 173.3 336h101.3c19.17 0 37.23 4.199 53.84 11.27c6.475 2.758 13.1 .9727 18.97-4.002c7.65-7.652 5.398-20.84-4.533-25.13C321.1 309.1 298.9 304 274.7 304H173.3C77.54 304-.1152 381.6 0 477.4C.0234 496.4 15.63 512 34.66 512h237.9c8.545 0 15.47-6.928 15.47-15.47v-1.059C287.1 486.9 281.1 480 272.5 480z" fill="currentColor"/></svg>
            </a>
            <img src="{{asset("/logo/logo3.png")}}" width="100" height="25">
            <a href="{{ url('/'. $profile->user->username) }}" title="">
                <svg style="height: 35px" aria-hidden="true" focusable="false" data-prefix="fa-light" data-icon="square-user" class="svg-inline--fa fa-square-user fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M384 32H64C28.65 32 0 60.65 0 96v320c0 35.35 28.65 64 64 64h320c35.35 0 64-28.65 64-64V96C448 60.65 419.3 32 384 32zM96 448c0-52.94 43.07-96 96-96h64c52.94 0 96 43.06 96 96H96zM416 416c0 17.64-14.36 32-32 32c0-70.69-57.31-128-128-128H192c-70.69 0-128 57.31-128 128c-17.64 0-32-14.36-32-32V96c0-17.64 14.36-32 32-32h320c17.64 0 32 14.36 32 32V416zM224 128C179.8 128 144 163.8 144 208C144 252.2 179.8 288 224 288c44.18 0 80-35.82 80-80C304 163.8 268.2 128 224 128zM224 256C197.5 256 176 234.5 176 208S197.5 160 224 160s48 21.53 48 48S250.5 256 224 256z" fill="currentColor"/></svg>
            </a>
        </div>

        <div class="card-body">
            <div class="my-avatar-round m-auto">
                <div class="my-avatar-photo0">
                <img style="width: 170px; height: 170px" src="{{ asset('user_img/no_img.png') }}">
                </div>
                <div class="my-avatar-photo1">
                    <img style="width: 170px; height: 170px" src="{{ asset($profile->user_img) }}">
                </div>
                <div class="my-avatar-photo2">
                    <img style="width: 172px; height: 172px" id="avatar" src="" alt="">
                </div>
            </div>
            <label class="my-avatar-btn" data-toggle="tooltip" title="">
                <svg style="height: 44px" aria-hidden="true" focusable="false" data-prefix="fa-regular" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z" fill="currentColor"/></svg>
                <input type="file" class="sr-only" id="input" name="image" accept="image/*">
            </label>

            <div class="alert" role="alert"></div>
            <div class="modal fade" id="modal" tabindex="-1" role="dialog"
                 aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                            <button type="button" class="btn btn-primary" id="crop">Обрезать</button>
                        </div>
                        <div class="modal-body">
                            <div class="img-container">
                                <img id="image" src="" alt="Photo">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <h4>{{ $profile->name }}</h4>
            </div>
            <div class="cutaway-info-description">
                <h6>{{ $profile->description }}</h6>
            </div>
            <div id="app">
                <div class="row m-3">
                    @if($profile->contacts)
                        <add-button :profile_id="{{ $profile->id  }}"
                                    :contacts="{{ $contacts->toJson() }}"></add-button>
                    @endif
                </div>
                <contact-buttons :movable="true" :contacts="{{ $profile->contacts->toJson() }}"></contact-buttons>
            </div>
        </div>

        <script src="https://unpkg.com/jquery@3/dist/jquery.min.js" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/bootstrap@4/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/cropper.js"></script>

        <script>
            window.addEventListener('DOMContentLoaded', function () {
                var avatar = document.getElementById('avatar');
                var image = document.getElementById('image');
                var input = document.getElementById('input');
                var $progress = $('.progress');

                var $alert = $('.alert');
                var $modal = $('#modal');
                var cropper;

                $('[data-toggle="tooltip"]').tooltip();

                input.addEventListener('change', function (e) {
                    var files = e.target.files;
                    var done = function (url) {
                        input.value = '';
                        image.src = url;
                        $alert.hide();
                        $modal.modal('show');
                    };
                    var reader;
                    var file;
                    var url;

                    if (files && files.length > 0) {
                        file = files[0];

                        if (URL) {
                            done(URL.createObjectURL(file));
                        } else if (FileReader) {
                            reader = new FileReader();
                            reader.onload = function (e) {
                                done(reader.result);
                            };
                            reader.readAsDataURL(file);
                        }
                    }
                });

                $modal.on('shown.bs.modal', function () {
                    cropper = new Cropper(image, {
                        aspectRatio: 1,
                        viewMode: 3,
                    });
                }).on('hidden.bs.modal', function () {
                    cropper.destroy();
                    cropper = null;
                });

                document.getElementById('crop').addEventListener('click', function () {
                    var initialAvatarURL;
                    var canvas;

                    $modal.modal('hide');

                    if (cropper) {
                        canvas = cropper.getCroppedCanvas({
                            width: 340,
                            height: 340,
                        });
                        initialAvatarURL = avatar.src;
                        avatar.src = canvas.toDataURL();
                        $progress.show();
                        $alert.removeClass('alert-success alert-warning');
                        canvas.toBlob(function (blob) {
                            var formData = new FormData();

                            formData.append('avatar', blob, 'avatar.jpg');
                            formData.append('_token', '{{ csrf_token() }}');

                            $.ajax('/profile/uploadAvatar/{{ $profile->id }}', {
                                method: 'POST',
                                data: formData,
                                processData: false,
                                contentType: false,

                                error: function () {
                                    avatar.src = initialAvatarURL;
                                    $alert.show().addClass('alert-warning').text('Ошибка загрузки');
                                },

                                complete: function () {
                                    $progress.hide();
                                },
                            });
                        });
                    }
                });
            });
        </script>

@endsection
