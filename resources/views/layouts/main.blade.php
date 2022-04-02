@extends('layouts.app')
@section('content')
    <div class="content">
      <div class="publis">
        @foreach ($content as $contentOpen)
            <div class="section">
                <div class="section__holder publish__holder">

                    @isset($contentOpen->title)
                        <div class="section__header publish__head">{{ $contentOpen->title }}</div>
                        @role('Admin')
                            <a href="/editpost/{{ $contentOpen->id }}" class="align-right mx-2  admin-tools"><i
                                    class="bi bi-pen"></i></a>
                            <a class="align-right  admin-tools"
                                onclick="return confirm('Вы уверены, что хотите удалить запись с заголовком {{ $contentOpen->title }} ?')"
                                href='delete/{{ $contentOpen->id }}'><i class="bi bi-trash"></i></a>
                        @endrole

                    @endisset

                    @isset($contentOpen->text)

                        <div class="section__maintext publish__main">{!! $contentOpen->text !!}</div>
                    @endisset

                    @isset($contentOpen->pictures)
                        <img class="section__img" src="{{ $contentOpen->pictures }}" alt="" srcset="" width="300">
                    @endisset
                </div>
            </div>
        @endforeach
      </div>



        {{-- OLYMP --}}

        @foreach ($olymp as $olymps)
            @if ($olymps->isActive)
                <div class="section">


                    <div class="section__header__olymp"> {{ $olymps->title }} </div>
                    @isset($olymps->forWho)
                        @if (stristr($olymps->forWho, 'школьник'))
                            <div class="section__header__who">для {{ $olymps->forWho }}ов </div>
                        @endif
                        @if (stristr($olymps->forWho, 'студент'))
                            <div class="section__header__who">для {{ $olymps->forWho }}ов </div>
                        @endif
                        @if (stristr($olymps->forWho, 'преподаватель'))
                            <div class="section__header__who">для {{ trim($olymps->forWho, 'ь') }}ей </div>
                        @endif
                    @endisset
                    <div class="section__holder">
                        @isset($olymps->title)
                        @endisset
                        @isset($olymps->about)
                            @role('Admin')
                                <a class="align-right mx-2 admin-tools" href='editoly/{{ $olymps->id }}'><b><i
                                            class="bi bi-pen"></b></i></a>
                                <a class="align-right admin-tools"
                                    onclick="return confirm('Вы уверены, что хотите удалить олимпиаду {{ $olymps->title }} ?')"
                                    href='deleteoly/{{ $olymps->title }}'><i class="bi bi-trash"></i></a>
                            @endrole

                            <div class="section__maintext">{!! $olymps->about !!}</div>
                        @endisset


                        @role('Admin')
                            <form action="/toggle" method="post">
                                <h3>Скрыть/показать олимпиаду юзерам</h3>
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <input type="hidden" name="title" value="{{ $olymps->title }}" />

                                <input type="number" name="toggle" min="0" max="1" value="{{ $olymps->isActive }}"
                                    class="btn-olymp" />

                                <button class="btn btn-danger" type="submit">подтвердить</button>
                            </form>
                        @endrole
                        <!-- Button trigger modal -->

                        <div class="d-flex justify-end">

                            @if (Auth::guest())
                                <a href="#{{ $olymps->title }}">
                                    <a class="btn-6" name="{{ $olymps->title }}" data-toggle="modal"
                                        data-target="#staticBackdrop{{ $olymps->id }}">
                                        Узнать подробности!
                                        <span></span>
                                    </a>
                                </a>
                            @endif


                            @role('Admin')
                                <button type="button" class="btn-olymp" name="{{ $olymps->title }}" data-toggle="modal"
                                    data-target="#staticBackdrop{{ $olymps->id }}">
                                    Узнать подробности
                                </button>
                            @endrole

                            @if (Auth::user())
                                @if (similar_text($userWho, $olymps->forWho) > 10)
                                    <a class="btn-6" name="{{ $olymps->title }}" data-toggle="modal"
                                        data-target="#staticBackdrop{{ $olymps->id }}">
                                        Узнать подробности
                                        <span></span>
                                    </a>
                                @endif
                            @endif

                        </div>

                        <!-- Modal -->
                        <div class="modal fade fs-5" id="staticBackdrop{{ $olymps->id }}" data-backdrop="static"
                            data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">{{ $olymps->title }}</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @isset($olymps->info)
                                            {!! $olymps->info !!}

                                        @endisset

                                        @isset($olymps->files)
                                            <div class="olympiadFile">
                                                <a href="{{ $olymps->files }}" target="_blank" download><i
                                                        class="bi bi-file-earmark-code display-1"></i></a>
                                            </div>
                                        @endisset
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-form__olymp danger"
                                            data-dismiss="modal">Закрыть</button>
                                        <form action="/choose" method="post" class="text-light m-2">
                                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                            <input type="text" name="pick" class="btn btn-outline-primary"
                                                value="{{ $olymps->title }}" style="display:none" />

                                            <input type="submit" class="btn btn-form__olymp success" value="Участвую!" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach


        @role('Admin')
            <div class="flex  mx-5">
                @foreach ($olymp as $adminOlymps)
                    <p>{{ $adminOlymps->title }}</p>
                    <form action="/toggle" method="post" class="m-2">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="title" value="{{ $adminOlymps->title }}" />

                        <input type="number" name="toggle" min="0" max="1" value="{{ $adminOlymps->isActive }}"
                            class="btn btn-outline-primary" />

                        <button class="btn btn-danger" type="submit">подтвердить</button>
                    </form>
                @endforeach
            </div>
        @endrole
    </div>
@endsection
