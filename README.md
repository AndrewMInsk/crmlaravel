Выкачиваем проект
docker-compose up --build из папки с проектом
Если не выкачает пакеты debian какие-то - включите VPN и пересоберите.
Процесс может идти 2-3 минуты.

В контейнере 'andrew_app':
npm install
npm run dev
composer install
http://localhost:8876/

Нужно зарегистрироваться и войти под этим пользователем. Новый пользователь автоматически получит права manager

http://localhost:8876/api/tickets - постом можно создать запрос. Документацию по этому методу может быть напишу позже в SWAGGER.

http://localhost:8876/widget - форма для такой же заявки, но она снова идет на /api/tickets.

http://localhost:8876/api/tickets/statistics - список вопросов по API

http://localhost:8876/api/tickets/statistics?period=day/month/week - фильтрация по периаоду


<iframe width="100%" height="100%" src="http://localhost:8876/widget"></iframe> - что бы это заработало, 
можно положить этот код в любой HTML файл и открыть его локально.
