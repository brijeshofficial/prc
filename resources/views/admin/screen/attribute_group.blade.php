@extends('admin.layout')

@section('main')
   <div class="row">
      <div class="col-md-12">
         <div class="box">
                <div class="box-header with-border">
                    <h2 class="box-title">{{ $title_description??'' }}</h2>

                    <div class="box-tools">
                        <div class="btn-group pull-right" style="margin-right: 5px">
                            <a href="{{ route('admin_attribute_group.index') }}" class="btn  btn-flat btn-default" title="List"><i class="fa fa-list"></i><span class="hidden-xs"> {{trans('admin.back_list')}}</span></a>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ $url_action }}" method="post" accept-charset="UTF-8" class="form-horizontal" id="form-main">
                    <div class="box-body">
                        <div class="fields-group">

                            <div class="form-group   {{ $errors->has('attribute_name') ? ' has-error' : '' }}">
                                <label for="name" class="col-sm-2 col-form-label">{{ trans('attribute_group.name') }}</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                        <input type="text" id="name" name="attribute_name" value="{!! old('attribute_name',($obj['attribute_name']??'')) !!}" class="form-control name" placeholder="" />
                                    </div>
                                        @if ($errors->has('attribute_name'))
                                            <span class="help-block">
                                                {{ $errors->first('attribute_name') }}
                                            </span>
                                        @endif
                                </div>
                            </div>

                            {{--<div class="form-group  {{ $errors->has('type') ? ' has-error' : '' }}">
                                <label for="type" class="col-sm-2 col-form-label">{{ trans('attribute_group.type') }}</label>
                                <div class="col-sm-8">
                                    <label class="radio-inline"><input type="radio" name="type" value="radio" {{ (old('type',($obj['type']??'')) =='radio')?'checked':'' }}>Radio</label>
                                    <label class="radio-inline"><input type="radio" name="type" value="select" {{ (old('type',($obj['type']??'')) =='select')?'checked':'' }}>Select</label>
                                    <label class="radio-inline"><input type="radio" name="type" value="text" {{ (old('type',($obj['type']??'')) =='select')?'checked':'' }}>Text</label>
                                        @if ($errors->has('type'))
                                            <span class="help-block">
                                                {{ $errors->first('type') }}
                                            </span>
                                        @endif
                                </div>
                            </div>--}}

                            <hr>

                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                            @csrf
                        <div class="col-md-2">
                        </div>

                        <div class="col-md-8">
                            <div class="btn-group pull-right">
                                <button type="submit" class="btn btn-primary">{{ trans('admin.submit') }}</button>
                            </div>

                            <div class="btn-group pull-left">
                                <button type="reset" class="btn btn-warning">{{ trans('admin.reset') }}</button>
                            </div>
                        </div>
                    </div>

                    <!-- /.box-footer -->
                </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
@endpush

@push('scripts')

</script>
@endpush
