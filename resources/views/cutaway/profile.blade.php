@extends('layouts.app')
@section('content')
    @php
        /**
        * @var \App\Models\Profile $profile
        */
    @endphp
    <link href="{{ asset('css/cropper.css') }}" rel="stylesheet">

    <form method="POST" action="{{ route('edit.profile', $profile->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="d-flex justify-content-between m-3">
                <a href="{{ route('edit', $profile->id) }}">
                    <svg style="height: 35px" aria-hidden="true" focusable="false" data-prefix="fa-light" data-icon="square-arrow-left" class="svg-inline--fa fa-square-arrow-left fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M336 240H150.6l68.69-68.69c6.25-6.25 6.25-16.38 0-22.62s-16.38-6.25-22.62 0l-96 96C97.56 247.8 96 251.9 96 256s1.562 8.184 4.688 11.31l96 96c6.25 6.25 16.38 6.25 22.62 0s6.25-16.38 0-22.62L150.6 272H336c8.844 0 16-7.154 16-15.1C352 247.2 344.8 240 336 240zM384 32H64C28.65 32 0 60.65 0 96v320c0 35.35 28.65 64 64 64h320c35.35 0 64-28.65 64-64V96C448 60.65 419.3 32 384 32zM416 416c0 17.64-14.36 32-32 32H64c-17.64 0-32-14.36-32-32V96c0-17.64 14.36-32 32-32h320c17.64 0 32 14.36 32 32V416z" fill="currentColor"/></svg>
                </a>
                <a href=#>
                    <img src="{{asset("/logo/logo3.png")}}" width="100" height="25">
                </a>
                <button type="submit" style="wight: 35px; border: #ffffff; color: #000000; background-color: #ffffff" title="Сохранить">
                    <svg style="height: 35px" aria-hidden="true" focusable="false" data-prefix="fa-light" data-icon="square-check" class="svg-inline--fa fa-square-check fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M384 32H64C28.65 32 0 60.65 0 96v320c0 35.35 28.65 64 64 64h320c35.35 0 64-28.65 64-64V96C448 60.65 419.3 32 384 32zM416 416c0 17.64-14.36 32-32 32H64c-17.64 0-32-14.36-32-32V96c0-17.64 14.36-32 32-32h320c17.64 0 32 14.36 32 32V416zM308.7 180.7L192 297.4L139.3 244.7c-6.25-6.25-16.38-6.25-22.62 0s-6.25 16.38 0 22.62l64 64C183.8 334.4 187.9 336 192 336s8.188-1.562 11.31-4.688l128-128c6.25-6.25 6.25-16.38 0-22.62S314.9 174.4 308.7 180.7z" fill="currentColor"/></svg>
                </button>
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

                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="name" class="form-label">Имя:</label>
                    </div>
                    <input id="name" type="text"
                           class="form-control @error('name') is-invalid @enderror" name="name"
                           value="{{ $profile->name }}" autocomplete="name">
                    @error('name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="description" class="form-label">Описание (350 символов):</label>
                        <span class="text-info" id="cnt"></span>
                    </div>
                    <textarea onkeyup="count(this)" id="description" type="text"
                              class="form-control @error('description') is-invalid @enderror"
                              name="description" autocomplete="description" rows="6" cols="30" wrap="soft"
                              maxlength="350"
                              placeholder="Напишите несколько строк о себе..."><?php echo $profile->description;?></textarea>
                    <span id="cnt"></span>

                    @error('description')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="username" class="form-label">Твоя красивая ссылка профиля:</label>
                    </div>
                    <div class="mb-3 input-group">
                        <input id="basic-addon3" type="text" class="input-group-text" value="https://my.addme.plus/"
                               readonly>
                        <input style="height: 45px" id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                               name="username" value="{{ $profile->user->username }}" autocomplete="user.username">
                        <button class="btn btn-secondary" type="button" id="copyText"
                                style="width: 50px; border-top-left-radius: 0; border-bottom-left-radius: 0;">
                            <svg aria-hidden="true" focusable="false" data-prefix="fa-thin" data-icon="copy" width="30" height="30" class="svg-inline--fa fa-copy fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M502.6 102.6l-93.26-93.25C403.4 3.371 395.2 0 386.7 0H271.1c-26.51 0-48 21.49-48 48v288c0 26.51 21.49 48 48 48H464c26.51 0 48-21.49 48-48l-.0001-210.7C511.1 116.8 508.6 108.6 502.6 102.6zM399.1 22.63L489.4 112h-65.38c-13.22 0-24-10.77-24-24V22.63zM495.1 336c0 17.64-14.36 32-32 32h-192c-17.64 0-32-14.36-32-32v-288c0-17.64 14.36-32 32-32h112v72c0 22.06 17.94 40 40 40h72V336zM279.1 448c-4.418 0-8 3.582-8 8v8c0 17.67-14.33 32-32 32h-192c-17.67 0-32-14.33-32-32v-288c0-17.67 14.33-32 32-32h104c4.418 0 8-3.582 8-8S156.4 128 151.1 128H47.1c-26.51 0-48 21.49-48 48v288c0 26.51 21.49 48 48 48h192c26.51 0 48-21.49 48-48l0-8C287.1 451.6 284.4 448 279.1 448z" fill="currentColor"/></svg>
                        </button>
                    </div>
                </div>
                @error('username')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
        </div>
    </form>

    <script src="https://unpkg.com/jquery@3/dist/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap@4/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/cropper.js"></script>

    <script>

        function count(x) {
            document.getElementById("cnt").innerHTML = x.value.length;
        }

        let btn = document.getElementById("copyText");
        btn.onclick = function () {
            let text1 = document.getElementById("basic-addon3").value;
            let text2 = document.getElementById("username").value;
            let ab = text1 + text2;
            let dummy = document.createElement("input");
            // Add it to the document
            document.body.appendChild(dummy);
            // Set its ID
            dummy.setAttribute("id", "dummy_id");
            // Output the array into it
            document.getElementById("dummy_id").value = ab;
            // Select it
            dummy.select();
            // Copy its contents
            document.execCommand("copy");
            // Remove it as its not needed anymore
            document.body.removeChild(dummy);
        }
    </script>

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
