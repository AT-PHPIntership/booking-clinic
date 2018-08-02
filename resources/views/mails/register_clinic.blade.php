<h1>{{ config('app.name') }}</h1>
<strong>@lang('mail.register.greeting')</strong>
<p>@lang('mail.register.content', ['url' => route('admin.register', ['q' => $clinic->query])])</p>
