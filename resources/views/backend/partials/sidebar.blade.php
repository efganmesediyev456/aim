<ul class="sidenav-inner py-1">

                   
                   

                   
<li class="sidenav-header small font-weight-semibold">Admin Panels</li>
<li class="sidenav-item  @if(in_array(\Request::route()->getName(),['blog.create','blog.edit','blog.index'])) active open @endif">
    <a href="javascript:" class="sidenav-link sidenav-toggle">
        <i class="sidenav-icon feather icon-activity"></i>
        <div>Xeberler ve Musabiqeler</div>
    </a>
    <ul class="sidenav-menu">
        <li class="sidenav-item @if(in_array(\Request::route()->getName(),['blog.create'])) active @endif"  ><a href="{{route('blog.create')}}" class="sidenav-link"><div>Create</div></a></li>
        <li class="sidenav-item @if(in_array(\Request::route()->getName(),['blog.index'])) active @endif"><a href="{{route('blog.index')}}" class="sidenav-link"><div>Xberler ve Musabiqeler</div></a></li>
    </ul>
</li>

<li class="sidenav-item @if(in_array(\Request::route()->getName(),['menu.create','menu.edit','menu.index'])) active open @endif">
    <a href="javascript:" class="sidenav-link sidenav-toggle">
        <i class="sidenav-icon feather icon-activity"></i>
        <div>Menus</div>
    </a>
    <ul class="sidenav-menu">
        <li class="sidenav-item @if(in_array(\Request::route()->getName(),['menu.create'])) active @endif"><a href="{{route('menu.create')}}" class="sidenav-link"><div>Menu Create</div></a></li>
        <li class="sidenav-item @if(in_array(\Request::route()->getName(),['menu.index'])) active @endif"><a href="{{route('menu.index')}}" class="sidenav-link"><div>Menus</div></a></li>
    </ul>
</li>


<li class="sidenav-item @if(in_array(\Request::route()->getName(),['rehber.create','rehber.edit','rehber.index'])) active open @endif">
    <a href="javascript:" class="sidenav-link sidenav-toggle">
        <i class="sidenav-icon feather icon-activity"></i>
        <div>Rehberler</div>
    </a>
    <ul class="sidenav-menu">
        <li class="sidenav-item @if(in_array(\Request::route()->getName(),['rehber.create'])) active @endif"><a href="{{route('rehber.create')}}" class="sidenav-link"><div>Rehber Create</div></a></li>
        <li class="sidenav-item @if(in_array(\Request::route()->getName(),['rehber.index'])) active @endif"><a href="{{route('rehber.index')}}" class="sidenav-link"><div>Rehber</div></a></li>
    </ul>
</li>


<li class="sidenav-item @if(in_array(\Request::route()->getName(),['law.create','law.edit','law.index'])) active open @endif">
    <a href="javascript:" class="sidenav-link sidenav-toggle">
        <i class="sidenav-icon feather icon-activity"></i>
        <div>Laws</div>
    </a>
    <ul class="sidenav-menu">
        <li class="sidenav-item @if(in_array(\Request::route()->getName(),['law.create'])) active @endif"><a href="{{route('law.create')}}" class="sidenav-link"><div>Law Create</div></a></li>
        <li class="sidenav-item @if(in_array(\Request::route()->getName(),['law.index'])) active @endif"><a href="{{route('law.index')}}" class="sidenav-link"><div>Laws</div></a></li>
    </ul>
</li>


<li class="sidenav-item @if(in_array(\Request::route()->getName(),['innovasiya.create','innovasiya.edit','innovasiya.index'])) active open @endif">
    <a href="javascript:" class="sidenav-link sidenav-toggle">
        <i class="sidenav-icon feather icon-activity"></i>
        <div>Innovasiya</div>
    </a>
    <ul class="sidenav-menu">
        <li class="sidenav-item @if(in_array(\Request::route()->getName(),['innovasiya.create'])) active @endif"><a href="{{route('innovasiya.create')}}" class="sidenav-link"><div>innovasiya Create</div></a></li>
        <li class="sidenav-item @if(in_array(\Request::route()->getName(),['innovasiya.index'])) active @endif"><a href="{{route('innovasiya.index')}}" class="sidenav-link"><div>innovasiya</div></a></li>
    </ul>
</li>

<li class="sidenav-item @if(in_array(\Request::route()->getName(),['elan.create','elan.edit','elan.index'])) active open @endif">
    <a href="javascript:" class="sidenav-link sidenav-toggle">
        <i class="sidenav-icon feather icon-activity"></i>
        <div>Elanlar</div>
    </a>
    <ul class="sidenav-menu">
        <li class="sidenav-item @if(in_array(\Request::route()->getName(),['elan.create'])) active @endif"><a href="{{route('elan.create')}}" class="sidenav-link"><div>elan Create</div></a></li>
        <li class="sidenav-item @if(in_array(\Request::route()->getName(),['elan.index'])) active @endif"><a href="{{route('elan.index')}}" class="sidenav-link"><div>elan</div></a></li>
    </ul>
</li>



<li class="sidenav-item @if(in_array(\Request::route()->getName(),['multimedia.create','multimedia.edit','multimedia.index'])) active open @endif">
    <a href="javascript:" class="sidenav-link sidenav-toggle">
        <i class="sidenav-icon feather icon-activity"></i>
        <div>Multimedia</div>
    </a>
    <ul class="sidenav-menu">
        <li class="sidenav-item @if(in_array(\Request::route()->getName(),['multimedia.create'])) active @endif"><a href="{{route('multimedia.create')}}" class="sidenav-link"><div>multimedia Create</div></a></li>
        <li class="sidenav-item @if(in_array(\Request::route()->getName(),['multimedia.index'])) active @endif"><a href="{{route('multimedia.index')}}" class="sidenav-link"><div>multimedia</div></a></li>
    </ul>
</li>



<li class="sidenav-item @if(in_array(\Request::route()->getName(),['faq.create','faq.edit','faq.index'])) active open @endif">
    <a href="javascript:" class="sidenav-link sidenav-toggle">
        <i class="sidenav-icon feather icon-activity"></i>
        <div>Faq</div>
    </a>
    <ul class="sidenav-menu">
        <li class="sidenav-item @if(in_array(\Request::route()->getName(),['faq.create'])) active @endif"><a href="{{route('faq.create')}}" class="sidenav-link"><div>Faq Create</div></a></li>
        <li class="sidenav-item @if(in_array(\Request::route()->getName(),['faq.index'])) active @endif"><a href="{{route('faq.index')}}" class="sidenav-link"><div>faq</div></a></li>
    </ul>
</li>



<li class="sidenav-item @if(in_array(\Request::route()->getName(),['teqvim.create','teqvim.edit','teqvim.index'])) active open @endif">
    <a href="javascript:" class="sidenav-link sidenav-toggle">
        <i class="sidenav-icon feather icon-activity"></i>
        <div>Teqvim</div>
    </a>
    <ul class="sidenav-menu">
        <li class="sidenav-item @if(in_array(\Request::route()->getName(),['teqvim.create'])) active @endif"><a href="{{route('teqvim.create')}}" class="sidenav-link"><div>Teqvim Create</div></a></li>
        <li class="sidenav-item @if(in_array(\Request::route()->getName(),['teqvim.index'])) active @endif"><a href="{{route('teqvim.index')}}" class="sidenav-link"><div>Teqvim</div></a></li>
    </ul>
</li>


<li class="sidenav-item @if(in_array(\Request::route()->getName(),['fealiyyet.create','fealiyyet.edit','fealiyyet.index'])) active open @endif">
    <a href="javascript:" class="sidenav-link sidenav-toggle">
        <i class="sidenav-icon feather icon-activity"></i>
        <div>Fealiyyet</div>
    </a>
    <ul class="sidenav-menu">
        <li class="sidenav-item @if(in_array(\Request::route()->getName(),['fealiyyet.create'])) active @endif"><a href="{{route('fealiyyet.create')}}" class="sidenav-link"><div>Fealiyyet Create</div></a></li>
        <li class="sidenav-item @if(in_array(\Request::route()->getName(),['fealiyyet.index'])) active @endif"><a href="{{route('fealiyyet.index')}}" class="sidenav-link"><div>Fealiyyet</div></a></li>
    </ul>
</li>


<li class="sidenav-item @if(request()->is('*contact')) active @endif">
                        <a href="/admin/contact" class="sidenav-link">
                            <i class="sidenav-icon feather icon-activity"></i>
                            <div>Contact</div>
                        </a>
    </li>




<li class="sidenav-item @if(request()->is('*setting')) active @endif">
                        <a href="/admin/setting" class="sidenav-link">
                            <i class="sidenav-icon feather icon-activity"></i>
                            <div>Setting</div>
                        </a>
    </li>



    <li class="sidenav-item @if(in_array(\Request::route()->getName(),['terefdas.create','terefdas.edit','terefdas.index'])) active open @endif">
    <a href="javascript:" class="sidenav-link sidenav-toggle">
        <i class="sidenav-icon feather icon-activity"></i>
        <div>Terefdas</div>
    </a>
    <ul class="sidenav-menu">
        <li class="sidenav-item @if(in_array(\Request::route()->getName(),['terefdas.create'])) active @endif"><a href="{{route('terefdas.create')}}" class="sidenav-link"><div>Terefdas Create</div></a></li>
        <li class="sidenav-item @if(in_array(\Request::route()->getName(),['terefdas.index'])) active @endif"><a href="{{route('terefdas.index')}}" class="sidenav-link"><div>Terefdas</div></a></li>
    </ul>
</li>




 <li class="sidenav-item @if(in_array(\Request::route()->getName(),['link.create','link.edit','link.index'])) active open @endif">
    <a href="javascript:" class="sidenav-link sidenav-toggle">
        <i class="sidenav-icon feather icon-activity"></i>
        <div>UseFull Links</div>
    </a>
    <ul class="sidenav-menu">
        <li class="sidenav-item @if(in_array(\Request::route()->getName(),['link.create'])) active @endif"><a href="{{route('link.create')}}" class="sidenav-link"><div>Link Create</div></a></li>
        <li class="sidenav-item @if(in_array(\Request::route()->getName(),['link.index'])) active @endif"><a href="{{route('link.index')}}" class="sidenav-link"><div>Links</div></a></li>
    </ul>
</li>



 <li class="sidenav-item @if(in_array(\Request::route()->getName(),['slider.create','slider.edit','slider.index'])) active open @endif">
    <a href="javascript:" class="sidenav-link sidenav-toggle">
        <i class="sidenav-icon feather icon-activity"></i>
        <div>Sliders</div>
    </a>
    <ul class="sidenav-menu">
        <li class="sidenav-item @if(in_array(\Request::route()->getName(),['slider.create'])) active @endif"><a href="{{route('slider.create')}}" class="sidenav-link"><div>slider Create</div></a></li>
        <li class="sidenav-item @if(in_array(\Request::route()->getName(),['slider.index'])) active @endif"><a href="{{route('link.index')}}" class="sidenav-link"><div>sliders</div></a></li>
    </ul>
</li>








<!-- 

<li class="sidenav-item active open">
    <a href="javascript:" class="sidenav-link sidenav-toggle">
        <i class="sidenav-icon feather icon-grid"></i>
        <div>Tables</div>
    </a>
    <ul class="sidenav-menu">
        <li class="sidenav-item ">
            <a href="tables_bootstrap.html" class="sidenav-link">
                <div>Bootstrap</div>
            </a>
        </li>
        <li class="sidenav-item active">
            <a href="tables_datatables.html" class="sidenav-link">
                <div>DataTables</div>
            </a>
        </li>
        <li class="sidenav-item">
            <a href="tables_bootstrap-table.html" class="sidenav-link">
                <div>Bootstrap table</div>
            </a>
        </li>
        <li class="sidenav-item">
            <a href="tables_bootstrap-sortable.html" class="sidenav-link">
                <div>Bootstrap Sortable</div>
            </a>
        </li>
    </ul>
</li> -->

</ul>