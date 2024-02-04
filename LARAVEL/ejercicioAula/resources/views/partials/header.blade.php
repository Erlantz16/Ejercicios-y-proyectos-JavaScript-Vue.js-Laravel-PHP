<nav class="dropdownmenu">
    <ul>
      <li><a href="{{route('alumnos.index')}}">Index</a></li>
      <li><a href="{{route('alumnos.index')}}">Ikasleak</a>
        <ul id="submenu">
          <li><a href="{{route('alumnos.index')}}">Ikasleen zerrenda</a></li>
          <li><a href="{{route('alumnos.create')}}">Ikaslea sortu</a></li>
        </ul>
      </li>
      <li><a href="{{route('cursos.index')}}">Ikastaroa</a>
        <ul id="submenu">
          <li><a href="{{route('cursos.index')}}">Ikastaroen zerrenda</a></li>
          <li><a href="{{route('cursos.create')}}">Ikastaroa sortu</a></li>
        </ul>
      </li>
      <li><a href="{{route('profesors.index')}}">Irakasleak</a>
        <ul id="submenu">
          <li><a href="{{route('profesors.index')}}">Irakasleen zerrenda</a></li>
          <li><a href="{{route('profesors.create')}}">Irakaslea sortu</a></li>
        </ul>
      </li>
    </ul>
</nav>
<br>