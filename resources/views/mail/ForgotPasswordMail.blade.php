<h3>Доброго времени суток!</h3>

<p>Вы запросили восстановление пароля на сайте <a href="{{route('home')}}">{{ parse_url(route('home'))['host'] }}</a></p>

<a href="{{route('new_password')."?token=".$token."&email=".$email}}">Восстановить пароль</a>

<p>Если вы этого не делали, то просто проигнорируйте сообщение. </p>

Хорошего дня!