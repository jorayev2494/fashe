<div class="col-md-3 border" style=" /* border-radius: 5px; */ ">
    <div class="panel-heading clearfix">
        <br>
        <p class="panel-title">@lang("langue.my_avatar")</p>
    </div>
    <br>
    <div class="text-center">
        <img src="{{ auth()->user()->getAvatar() }}" class="avatar img-circle img-thumbnail" alt="{{ auth()->user()->getAvatar() }}" style="border-radius: 50%;">
    </div>
    <br>

    <ul>
        <li class="p-t-6 p-b-8 bo6">
            <a href="{{ route('profile.orders') }}" class="s-text13 p-t-5 p-b-5" style="display: block; padding-left: 4px;">@lang("langue.my_orders")</a>
        </li>

        <li class="p-t-6 p-b-8 bo7">
            <a href="{{ route('profile.show') }}" class="s-text13 p-t-5 p-b-5" style="display: block; padding-left: 4px;">@lang("langue.my_buys")</a>
        </li>
    </ul>

    <br>
</div>
