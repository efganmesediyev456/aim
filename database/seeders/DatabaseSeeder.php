<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Blog;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


    	



        \DB::statement("INSERT INTO `menus` (`id`, `parent_id`, `status`, `slug`, `created_at`, `updated_at`, `file`) VALUES
(4, 0, 0, 'haqqimizda', '2022-02-06 22:09:51', '2022-02-06 22:09:51', NULL),
(5, 4, 1, 'merkez-haqqimizda', '2022-02-06 22:11:07', '2022-02-13 06:48:04', '6208a9a36e97f.pdf'),
(6, 4, 1, 'vision-ve-mission', '2022-02-06 23:23:48', '2022-02-07 02:46:49', NULL),
(7, 4, 0, 'rehberlik', '2022-02-06 23:26:11', '2022-02-06 23:26:11', NULL),
(8, 4, 0, 'struktur', '2022-02-06 23:27:05', '2022-02-06 23:27:05', NULL),
(9, 0, 0, 'qanunvericilik', '2022-02-06 23:27:58', '2022-02-06 23:27:58', NULL),
(10, 9, 0, 'qanunlar', '2022-02-06 23:30:47', '2022-02-06 23:30:47', NULL),
(11, 9, 0, 'strateji-yol-xeritesi', '2022-02-06 23:31:47', '2022-02-06 23:31:47', NULL),
(12, 9, 0, 'dovlet-proqramlari', '2022-02-06 23:32:29', '2022-02-06 23:32:29', NULL),
(13, 9, 1, 'nizamname', '2022-02-06 23:33:30', '2022-02-08 00:06:45', NULL),
(14, 0, 0, 'innovasiya-teqvimi', '2022-02-06 23:34:09', '2022-02-06 23:34:09', NULL),
(15, 0, 0, 'hesabatlar', '2022-02-06 23:34:58', '2022-02-06 23:34:58', NULL),
(16, 15, 0, 'umumi-hesabatlar', '2022-02-06 23:35:39', '2022-02-06 23:35:39', NULL),
(17, 15, 0, 'innovasiya-festivali', '2022-02-06 23:36:21', '2022-02-06 23:36:21', NULL),
(18, 15, 0, 'musabiqeler', '2022-02-06 23:36:57', '2022-02-06 23:36:57', NULL),
(19, 15, 0, 'layiheler', '2022-02-06 23:37:36', '2022-02-06 23:37:36', NULL),
(20, 0, 0, 'media', '2022-02-06 23:38:18', '2022-02-06 23:38:18', NULL),
(21, 20, 0, 'xeberler', '2022-02-06 23:38:56', '2022-02-06 23:38:56', NULL),
(22, 20, 0, 'elanlar', '2022-02-06 23:39:42', '2022-02-06 23:39:42', NULL),
(23, 20, 0, 'multimedia', '2022-02-06 23:40:18', '2022-02-06 23:40:18', NULL),
(24, 20, 0, 'brandbook', '2022-02-06 23:40:53', '2022-02-06 23:40:53', NULL),
(25, 0, 0, 'elaqe', '2022-02-06 23:41:31', '2022-02-06 23:41:31', NULL),
(26, 0, 1, 'platforma', '2022-02-11 04:49:07', '2022-02-11 04:49:07', NULL);");



        \DB::statement("INSERT INTO `menu_translations` (`id`, `menu_id`, `locale`, `name`, `content`, `created_at`, `updated_at`) VALUES
(52, 4, 'az', 'Haqqımızda', NULL, NULL, NULL),
(53, 4, 'en', 'About us', NULL, NULL, NULL),
(54, 4, 'ru', 'О нас', NULL, NULL, NULL),
(67, 9, 'az', 'Qanunvericilik', NULL, NULL, NULL),
(68, 9, 'en', 'Legislation', NULL, NULL, NULL),
(69, 9, 'ru', 'Законодательство', NULL, NULL, NULL),
(70, 10, 'az', 'Qanunlar', NULL, NULL, NULL),
(71, 10, 'en', 'Laws', NULL, NULL, NULL),
(72, 10, 'ru', 'Законы', NULL, NULL, NULL),
(73, 11, 'az', 'Strateji yol xəritəsi', NULL, NULL, NULL),
(74, 11, 'en', 'Strategic road map', NULL, NULL, NULL),
(75, 11, 'ru', 'Стратегическая дорожная карта', NULL, NULL, NULL),
(76, 12, 'az', 'Dövlət proqramları', NULL, NULL, NULL),
(77, 12, 'en', 'Government programs', NULL, NULL, NULL),
(78, 12, 'ru', 'Государственные программы', NULL, NULL, NULL),
(82, 14, 'az', 'İnnovasiya təqvimi', NULL, NULL, NULL),
(83, 14, 'en', 'Innovation calendar', NULL, NULL, NULL),
(84, 14, 'ru', 'Календарь инноваций', NULL, NULL, NULL),
(85, 15, 'az', 'Hesabatlar', NULL, NULL, NULL),
(86, 15, 'en', 'Reports', NULL, NULL, NULL),
(87, 15, 'ru', 'Отчеты', NULL, NULL, NULL),
(88, 16, 'az', 'Ümumi Hesabatlar', NULL, NULL, NULL),
(89, 16, 'en', 'General Reports', NULL, NULL, NULL),
(90, 16, 'ru', 'Общие отчеты', NULL, NULL, NULL),
(91, 17, 'az', 'İnnovasiya festivalı', NULL, NULL, NULL),
(92, 17, 'en', 'Innovation festival', NULL, NULL, NULL),
(93, 17, 'ru', 'Инновационный фестиваль', NULL, NULL, NULL),
(94, 18, 'az', 'Müsabiqələr', NULL, NULL, NULL),
(95, 18, 'en', 'Competitions', NULL, NULL, NULL),
(96, 18, 'ru', 'Соревнования', NULL, NULL, NULL),
(97, 19, 'az', 'Layihələr', NULL, NULL, NULL),
(98, 19, 'en', 'Projects', NULL, NULL, NULL),
(99, 19, 'ru', 'Проекты', NULL, NULL, NULL),
(100, 20, 'az', 'Media', NULL, NULL, NULL),
(101, 20, 'en', 'Media', NULL, NULL, NULL),
(102, 20, 'ru', 'Средства массовой информации', NULL, NULL, NULL),
(103, 21, 'az', 'Xəbərlər', NULL, NULL, NULL),
(104, 21, 'en', 'News', NULL, NULL, NULL),
(105, 21, 'ru', 'Новости', NULL, NULL, NULL),
(106, 22, 'az', 'Elanlar', NULL, NULL, NULL),
(107, 22, 'en', 'Advertisements', NULL, NULL, NULL),
(108, 22, 'ru', 'Объявления', NULL, NULL, NULL),
(109, 23, 'az', 'Multimedia', NULL, NULL, NULL),
(110, 23, 'en', 'Multimedia', NULL, NULL, NULL),
(111, 23, 'ru', 'Мультимедиа', NULL, NULL, NULL),
(112, 24, 'az', 'Brandbook', NULL, NULL, NULL),
(113, 24, 'en', 'Brandbook', NULL, NULL, NULL),
(114, 24, 'ru', 'Брендбук', NULL, NULL, NULL),
(115, 25, 'az', 'Əlaqə', NULL, NULL, NULL),
(116, 25, 'en', 'Contact', NULL, NULL, NULL),
(117, 25, 'ru', 'Контакт', NULL, NULL, NULL),
(181, 5, 'az', 'Mərkəz haqqımızda', '<p>Nazirlər Kabinetinin 16 dekabr 1999-cu il 190 n&ouml;mrəli qərarı ilə yaradılmış Aqrar İnnovasiya Mərkəzi 42 d&ouml;vlət toxum&ccedil;uluq, tinglik və damazlıq m&uuml;əssisələrinin aqrar elmdəki vahid strateji məqsədlərini formalaşdırmaq, alınan elmi nəticələrin &ouml;zəl təsərr&uuml;fatlarda tətbiqinin səmərəliliyini həyata ke&ccedil;irir.&ldquo;Aqrar sahədə idarəetmənin təkmilləşdirilməsi və institusional islahatların s&uuml;rətləndirilməsi ilə bağlı tədbirlər haqqında&rdquo; Azərbaycan Respublikası Prezidentinin 2014-c&uuml; il 16 aprel tarixli 152 n&ouml;mrəli Fərmanının 2.8-ci bəndinin icrasını təmin etmək məqsədi ilə Nazirlər Kabinetinin qərarı ilə sonradan Mərkəzin adı dəyişdirilərək, Aqrar İnformasiya Məsləhət Mərkəzi, Nazirlər Kabinetinin &ldquo;Aqrar İnnovasiya Mərkəzinin və onun tabeliyindəki elmi-tədqiqat institutlarının strukturunun təkmilləşdirilməsi haqqında&rdquo; 2015-ci il 17 aprel tarixli, 109 n&ouml;mrəli qərarına g&ouml;rə isə &ldquo;Aqrar İnnovasiya Mərkəzi&rdquo; adlandırılır.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:8000/storage/uploads/merkez_1644201235.png\" style=\"height:100%; width:100%\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4>İnstitutun əsas fəaliyyət istiqamətləri aşağıdakılardır:</h4>\r\n\r\n<ul>\r\n   <li>Mərkəz kənd təsərr&uuml;fatı sahəsində tələbata y&ouml;n&uuml;ml&uuml;l&uuml;k, keyfiyyət, innovasiya prinsipləri və iqtisadi sahədə qabaqcıl digər beynəlxalq prinsip və standartlar nəzərə alınmaqla aşağıdakı istiqamətlərdə fəaliyyət g&ouml;stərir:</li>\r\n   <li>Nazirlik sistemində fəaliyyət g&ouml;stərən elmi-tədqiqat m&uuml;əssisələrində kənd təsərr&uuml;fatının m&uuml;h&uuml;m istiqamətləri &uuml;zrə fundamental və tətbiqi tədqiqatların planlaşdırılması və koordinasiyası; ailə təsərr&uuml;fatlarına, ki&ccedil;ik və orta sahibkarlara dəstək layihələrinin həyata ke&ccedil;irilməsi, bu layihələrin maliyyələşdirilməsi məqsədi ilə fondların yaradılması;</li>\r\n   <li>Azərbaycan Milli Elmlər Akademiyası və Elm Fondu ilə əlaqəli şəkildə m&uuml;vafiq elmi təşkilatların və ali təhsil m&uuml;əssisələrinin elmi və elmi-praktiki fəaliyyətinin əlaqələndirilməsində iştirak;</li>\r\n</ul>\r\n\r\n<h4>&nbsp;</h4>\r\n\r\n<h4>AİM-in məqsədi</h4>\r\n\r\n<p>Mərkəzin yaradılmasında məqsəd Azərbaycan Respublikasında kənd təsərr&uuml;fatının elmi əsaslarla inkişaf etdirilməsi, onun və tabeliyindəki qurumların vahid şəkildə idarə edilməsi, mərkəzin və onun tabeli qurumlarının fəaliyyətinə nəzarət edilməsi və koordinasiya olunması, &ouml;lkənin iqtisadi vəziyyətinin yaxşılaşdırılması &uuml;&ccedil;&uuml;n kənd təsərr&uuml;fatı sahəsində fəaliyyət g&ouml;stərən fermerlərə elmi-metodik dəstəyin g&ouml;stərilməsi, kənd təsərr&uuml;fatının innovativ tələblərə uyğun formalaşdırılması və regionlarda kənd təsərr&uuml;fatının innovativ inkişafı sahəsində sistemli tədbirlərin g&ouml;r&uuml;lməsi, iqtisadi, sosial və regional siyasətin həyata ke&ccedil;irilməsi, şəffaflığın və &ccedil;evikliyin təmin edilməsidir.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4>Mərkəzin h&uuml;quq və vəzifələri</h4>\r\n\r\n<p>1.1. Mərkəz fəaliyyət istiqamətinə uyğun olaraq &ouml;lkədə aqrar sahənin elmi təminatının bazar m&uuml;nasibətləri şəraitində dinamik inkişafını, qabaqcıl beynəlxalq təcr&uuml;bə nəzərə alınmaqla aqrar elmi tədqiqatların səmərəliliyinin artırılmasını, nəticələrin geniş tətbiqini və kənd təsərr&uuml;fatı informasiya-məsləhət xidmətinin təşkilini təmin etmək məqsədi ilə aşağıdakı vəzifələri yerinə yetirir:</p>\r\n\r\n<p>1.2. Aqrar sahənin prioritet istiqamətləri &uuml;zrə elmi-tədqiqat işlərinin aparılmasını, kənd təsərr&uuml;fatı informasiya-məsləhət xidməti subyektləri arasında qarşılıqlı əlaqələrin qurulmasını və birgə fəaliyyət proqramının hazırlanıb həyata ke&ccedil;irilməsini təşkil edir;</p>\r\n\r\n<p>1.3. Kənd Təsərr&uuml;fatı Nazirliyi sistemində fəaliyyət g&ouml;stərən elmi-tədqiqat m&uuml;əssisələrinin fəaliyyətini əlaqələndirir;</p>', NULL, NULL),
(182, 5, 'en', 'About the center', '<p>Agrarian Innovation Center established by the Resolution of the Cabinet of Ministers No. 190 of December 16, 1999 to form the common strategic goals of 42 state seed, seedling and breeding enterprises in agrarian science, increase the efficiency of scientific results, wide application of results and organization of agricultural information-consulting service In order to perform the following tasks:</p>\r\n\r\n<p>1.2. Organizes the conduct of scientific research in the priority areas of the agricultural sector, the establishment of mutual relations between the subjects of agricultural information and advisory services and the development and implementation of a joint action program;</p>\r\n\r\n<p>1.3. Coordinates the activities of research institutions operating in the system of the Ministry of Agriculture;</p>', NULL, NULL),
(183, 5, 'ru', 'О центре', '<p>Аграрный инновационный центр создан Постановлением Кабинета Министров № 190 от 16 декабря 1999 года для формирования общих стратегических целей 42 государственных семеноводческих, селекционных и племенных предприятий в аграрной науке, повышения эффективности научных результатов, широкого применения результатов и организация сельскохозяйственной информационно-консультационной службы В целях выполнения следующих задач:</p>\r\n\r\n<p>1.2. организует проведение научных исследований по приоритетным направлениям агропромышленного комплекса, установление взаимоотношений между субъектами аграрного информационно-консультационного обслуживания и разработку и реализацию программы совместных действий;</p>\r\n\r\n<p>1.3. Координирует деятельность научно-исследовательских учреждений, работающих в системе Министерства сельского хозяйства;</p>', NULL, NULL),
(184, 6, 'az', 'Vision və Mission', '<h3>Vision</h3>\r\n\r\n<p>Mərkəzin yaradılmasında məqsəd Azərbaycan Respublikasında kənd təsərr&uuml;fatının elmi əsaslarla inkişaf etdirilməsi, onun və tabeliyindəki qurumların vahid şəkildə idarə edilməsi, mərkəzin və onun tabeli qurumlarının fəaliyyətinə nəzarət edilməsi və koordinasiya olunması, &ouml;lkənin iqtisadi vəziyyətinin yaxşılaşdırılması &uuml;&ccedil;&uuml;n kənd təsərr&uuml;fatı sahəsində fəaliyyət g&ouml;stərən fermerlərə elmi-metodik dəstəyin g&ouml;stərilməsi, kənd təsərr&uuml;fatının innovativ tələblərə uyğun formalaşdırılması və regionlarda kənd təsərr&uuml;fatının innovativ inkişafı sahəsində sistemli tədbirlərin g&ouml;r&uuml;lməsi, iqtisadi, sosial və regional siyasətin həyata ke&ccedil;irilməsi, şəffaflığın və &ccedil;evikliyin təmin edilməsidir.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>Mission</h3>\r\n\r\n<p>Mərkəzin yaradılmasında məqsəd Azərbaycan Respublikasında kənd təsərr&uuml;fatının elmi əsaslarla inkişaf etdirilməsi, onun və tabeliyindəki qurumların vahid şəkildə idarə edilməsi, mərkəzin və onun tabeli qurumlarının fəaliyyətinə nəzarət edilməsi və koordinasiya olunması, &ouml;lkənin iqtisadi vəziyyətinin yaxşılaşdırılması &uuml;&ccedil;&uuml;n kənd təsərr&uuml;fatı sahəsində fəaliyyət g&ouml;stərən fermerlərə elmi-metodik dəstəyin g&ouml;stərilməsi, kənd təsərr&uuml;fatının innovativ tələblərə uyğun formalaşdırılması və regionlarda kənd təsərr&uuml;fatının innovativ inkişafı sahəsində sistemli tədbirlərin g&ouml;r&uuml;lməsi, iqtisadi, sosial və regional siyasətin həyata ke&ccedil;irilməsi, şəffaflığın və &ccedil;evikliyin təmin edilməsidir.</p>', NULL, NULL),
(185, 6, 'en', 'Vision and Mission', '<p>Vision<br />\r\nThe purpose of the center is to develop agriculture in the Republic of Azerbaijan on a scientific basis, to manage it and its subordinate institutions, to control and coordinate the activities of the center and its subordinate bodies, to provide scientific and methodological support to farmers working in agriculture. formation of agriculture in accordance with innovative requirements and taking systematic measures in the field of innovative development of agriculture in the regions, implementation of economic, social and regional policies, ensuring transparency and flexibility.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Mission<br />\r\nThe purpose of the center is to develop agriculture in the Republic of Azerbaijan on a scientific basis, to manage it and its subordinate institutions, to control and coordinate the activities of the center and its subordinate bodies, to provide scientific and methodological support to farmers working in agriculture. formation of agriculture in accordance with innovative requirements and taking systematic measures in the field of innovative development of agriculture in the regions, implementation of economic, social and regional policies, ensuring transparency and flexibility.</p>', NULL, NULL),
(186, 6, 'ru', 'Видение и миссия', '<p>Зрение<br />\r\nЦелью центра является развитие сельского хозяйства в Азербайджанской Республике на научной основе, управление им и подведомственными ему учреждениями, контроль и координация деятельности центра и подведомственных ему органов, оказание научно-методической поддержки фермерам, работающим в сельском хозяйстве формирование сельского хозяйства в соответствии с инновационными требованиями и принятие системных мер в области инновационного развития сельского хозяйства в регионах, реализация экономической, социальной и региональной политики, обеспечение прозрачности и гибкости.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Миссия<br />\r\nЦелью центра является развитие сельского хозяйства в Азербайджанской Республике на научной основе, управление им и подведомственными ему учреждениями, контроль и координация деятельности центра и подведомственных ему органов, оказание научно-методической поддержки фермерам, работающим в сельском хозяйстве формирование сельского хозяйства в соответствии с инновационными требованиями и принятие системных мер в области инновационного развития сельского хозяйства в регионах, реализация экономической, социальной и региональной политики, обеспечение прозрачности и гибкости.</p>', NULL, NULL),
(187, 7, 'az', 'Rəhbərlik', NULL, NULL, NULL),
(188, 7, 'en', 'Leadership', NULL, NULL, NULL),
(189, 7, 'ru', 'Лидерство', NULL, NULL, NULL),
(193, 8, 'az', 'Struktur', NULL, NULL, NULL),
(194, 8, 'en', 'Structure', NULL, NULL, NULL),
(195, 8, 'ru', 'Cтруктура', NULL, NULL, NULL),
(196, 13, 'az', 'Nizamnamə', '<p>Nazirlər Kabinetinin 16 dekabr 1999-cu il 190 n&ouml;mrəli qərarı ilə yaradılmış Aqrar İnnovasiya Mərkəzi 42 d&ouml;vlət toxum&ccedil;uluq, tinglik və damazlıq m&uuml;əssisələrinin aqrar elmdəki vahid strateji məqsədlərini formalaşdırmaq, alınan elmi nəticələrin &ouml;zəl təsərr&uuml;fatlarda tətbiqinin səmərəliliyini həyata ke&ccedil;irir. &ldquo;Aqrar sahədə idarəetmənin təkmilləşdirilməsi və institusional islahatların s&uuml;rətləndirilməsi ilə bağlı tədbirlər haqqında&rdquo; Azərbaycan Respublikası Prezidentinin 2014-c&uuml; il 16 aprel tarixli 152 n&ouml;mrəli Fərmanının 2.8-ci bəndinin icrasını təmin etmək məqsədi ilə Nazirlər Kabinetinin qərarı ilə sonradan Mərkəzin adı dəyişdirilərək, Aqrar İnformasiya Məsləhət Mərkəzi, Nazirlər Kabinetinin &ldquo;Aqrar İnnovasiya Mərkəzinin və onun tabeliyindəki elmi-tədqiqat institutlarının strukturunun təkmilləşdirilməsi haqqında&rdquo; 2015-ci il 17 aprel tarixli, 109 n&ouml;mrəli qərarına g&ouml;rə isə &ldquo;Aqrar İnnovasiya Mərkəzi&rdquo; adlandırılır.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h4>1. &Uuml;mumi m&uuml;ddəalar</h4>\r\n\r\n<p>1.1. &ldquo;Aqrar Tədqiqatlar Mərkəzi&rdquo; publik h&uuml;quqi şəxsi (bundan sonra &ndash; Mərkəz) &ldquo;Azərbaycan Respublikası Kənd Təsərr&uuml;fatı Nazirliyinin tabeliyində Aqrar Tədqiqatlar Mərkəzinin yaradılması haqqında&rdquo; Azərbaycan Respublikası Prezidentinin 2018-ci il 22 may tarixli 89 n&ouml;mrəli Fərmanının 1-ci hissəsinə əsasən aqrar sahədə elmi tədqiqat institutlarının fəaliyyətinin g&uuml;cləndirilməsi, təhlil, qiymətləndirmə və proqnozlaşdırmanın aparılması, aqrar-sənaye kompleksi &uuml;zrə m&uuml;xtəlif xidmətlərin, o c&uuml;mlədən d&ouml;vlət sifarişlərinin yerinə yetirilməsi, kənd təsərr&uuml;fatının inkişafı ilə bağlı məlumat bazasının yaradılması, proqram və layihələrin hazırlanması, sahənin strateji planlaşdırılmasının və innovativ inkişafının təmin edilməsi məqsədi ilə yaradılmış Azərbaycan Respublikasının Kənd Təsərr&uuml;fatı Nazirliyinin (bundan sonra - Nazirlik) tebeliyindəki qurumdur.</p>', NULL, NULL),
(197, 13, 'en', 'Charter', NULL, NULL, NULL),
(198, 13, 'ru', 'Устав', '<p>Созданный Постановлением Кабинета Министров № 190 от 16 декабря 1999 года Аграрный инновационный центр осуществляет формирование общих стратегических целей в аграрной науке 42 государственных семеноводческих, селекционных и племенных предприятий, эффективность применения научных результатов в частных хозяйствах. В целях обеспечения выполнения пункта 2.8 Указа Президента Азербайджанской Республики от 16 апреля 2014 года № 152 &laquo;О мерах по совершенствованию управления и ускорению институциональных реформ в сельскохозяйственном секторе&raquo; Центр впоследствии был переименован в Кабинет Министров.В соответствии с Постановлением Кабинета Министров № 109 от 17 апреля 2015 года &laquo;О совершенствовании структуры Аграрно-инновационного центра и подведомственных ему научно-исследовательских институтов&raquo; он именуется &laquo;Аграрно-инновационный центр&raquo;.</p>\r\n\r\n<p>1. Общие положения<br />\r\n1.1. Публичное юридическое лицо &laquo;Центр аграрных исследований&raquo; (далее - Центр) Создано для усиления деятельности, проведения анализа, оценки и прогнозирования, выполнения различных услуг в агропромышленном комплексе, в том числе государственных заказов, создания базы данных по развитию сельского хозяйства , разрабатывает программы и проекты, обеспечивает стратегическое планирование и инновационное развитие отрасли и является органом, подведомственным Министерству сельского хозяйства Азербайджанской Республики (далее - Министерство).</p>', NULL, NULL),
(199, 26, 'az', 'Aqrar İnnovasiya Platforması', '<p>Nazirlər Kabinetinin 16 dekabr 1999-cu il 190 n&ouml;mrəli qərarı ilə yaradılmış Aqrar İnnovasiya Mərkəzi 42 d&ouml;vlət toxum&ccedil;uluq, tinglik və damazlıq m&uuml;əssisələrinin aqrar elmdəki vahid strateji məqsədlərini formalaşdırmaq, alınan elmi nəticələrin &ouml;zəl təsərr&uuml;fatlarda tətbiqinin səmərəliliyini həyata ke&ccedil;irir.&ldquo;Aqrar sahədə idarəetmənin təkmilləşdirilməsi və institusional islahatların s&uuml;rətləndirilməsi ilə bağlı tədbirlər haqqında&rdquo; Azərbaycan Respublikası Prezidentinin 2014-c&uuml; il 16 aprel tarixli 152 n&ouml;mrəli Fərmanının 2.8-ci bəndinin icrasını təmin etmək məqsədi ilə Nazirlər Kabinetinin qərarı ilə sonradan Mərkəzin adı dəyişdirilərək, Aqrar İnformasiya Məsləhət Mərkəzi, Nazirlər Kabinetinin &ldquo;Aqrar İnnovasiya Mərkəzinin və onun tabeliyindəki elmi-tədqiqat institutlarının strukturunun təkmilləşdirilməsi haqqında&rdquo; 2015-ci il 17 aprel tarixli, 109 n&ouml;mrəli qərarına g&ouml;rə isə &ldquo;Aqrar İnnovasiya Mərkəzi&rdquo; adlandırılır.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:8000/storage/uploads/paltforma_1644554913.png\" style=\"height:100%; width:100%\" /></p>', NULL, NULL),
(200, 26, 'en', 'Agrarian Innovation Platform', '<p>Agrarian Innovation Platform</p>', NULL, NULL),
(201, 26, 'ru', 'Аграрная инновационная платформа', NULL, NULL, NULL);
");






User::create([
'name'=>'admin',
'password'=>Hash::make('admin2022'),
'email'=>'admin@gmail.com'
]);





    	

       


    }
}
