@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('book::books.title.edit book') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.book.book.index') }}">{{ trans('book::books.title.books') }}</a></li>
        <li class="active">{{ trans('book::books.title.edit book') }}</li>
    </ol>
@stop

@section('styles')
    {!! Theme::script('js/vendor/ckeditor/ckeditor.js') !!}
    {!! Theme::style('css/vendor/iCheck/flat/blue.css') !!}
@stop

@section('content')
    {!! Form::open(['route' => ['admin.book.book.update', $book->id], 'method' => 'put']) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                @include('partials.form-tab-headers')
                <div class="tab-content">
                    {!! Form::normalInput('name', 'Name', $errors, $book) !!}
                    {!! Form::normalInput('url', 'Url', $errors, $book) !!}
                    {!! Form::normalInput('author_name', 'Author Name', $errors, $book) !!}
                    <div class="form-group">
                        <label for="status_id">Status</label>
                        <select name="status_id" id="status_id" class="form-control">
                            <?php foreach ($statuses as $status): ?>
                                <option value="{{ $status->id }}" {{ $book->status_id === $status->id ? 'selected' : ''}}>
                                    {{ $status->name }}
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    @include('media::admin.fields.file-link', [
                       'entityClass' => 'Modules\\\\Book\\\\Entities\\\\Book',
                       'entityId' => $book->id,
                       'zone' => 'bookcover'
                   ])

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.update') }}</button>
                        <button class="btn btn-default btn-flat" name="button" type="reset">{{ trans('core::core.button.reset') }}</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.book.book.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                    </div>
                </div>
            </div> {{-- end nav-tabs-custom --}}
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index') }}</dd>
    </dl>
@stop

@section('scripts')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?= route('admin.book.book.index') ?>" }
                ]
            });
        });
    </script>
    <script>
        $( document ).ready(function() {
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });

            $('input[type="checkbox"]').on('ifChecked', function(){
                $(this).parent().find('input[type=hidden]').remove();
            });

            $('input[type="checkbox"]').on('ifUnchecked', function(){
                var name = $(this).attr('name'),
                    input = '<input type="hidden" name="' + name + '" value="0" />';
                $(this).parent().append(input);
            });
        });
    </script>
@stop
