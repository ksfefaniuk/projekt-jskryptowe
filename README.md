Aplikacja biblioteki została stworzona aby wspomóc i uporządkować działanie biblioteki, w której użytkownik jest w stanie zarezerwować książkę będąc zalogowanym na swoim koncie, a administrator zarządzający biblioteką monitoruje oraz odznacza wypożyczone oraz zwrócone książki.
Aplikacja została napisana w języku skryptowym PHP oraz łączy się z bazą danych MySQL. 
W bazie danych znajdują się tabele :
1.	Student – login hasło potrzebne do logowania, reszta danych standardowo.
2.	Dzieł.
3.	Egzemplarzy – ta tabela wspomaga wypożyczenie konkretnego egzemplarza danego dzieła, z którym się łączy. Ponieważ w bibliotekach posiadamy wiele egzemplarzy jednego dzieła.
4.	Wydawnictw.
5.	Rezerwacji – mamy tu daty wg których ustalamy datę wypożyczenia oraz zwrócenia egzemplarza. <br><br>


Zaczynając od profilu administratora - ma on przyznane prawa do zarządzania biblioteką oraz jej zasobami w całości. <br><br>
1.	Posiada wgląd do listy studentów, których jest w stanie wyszukiwać po numerze indeksu lub nazwisku studenta. Następnie jesteśmy w stanie edytować dane studenta, oraz zatwierdzić wprowadzone zmiany. <br>
2.	Posiada wgląd do listy dzieł, które jest w stanie przeszukiwać, edytować  oraz usuwać. Na stronie jest także formularz do dodania nowej pozycji dzieła, jeśli taka pojawiła się w bibliotece. <br>
3.	Lista egzemplarzy, w której analogicznie są takie same funkcje.<br>
4.	Posiada kontrole nad listą wydawnictw, które przypisane są do wcześniej pokazanych egzemplarzy i wybierane są jako dropdown. Podobnie jak wcześniej admin może tu wyszukiwać, dodawać, edytować oraz usuwać. <br>
5.	Zarządza rezerwacjami, w których wyświetlane są wszystkie rezerwacje wraz z ich datami rezerwacji, odebrania oraz zwrócenia egzemplarza przez użytkownika. <br><br>
Na tym kończy się profil administratora biblioteki, tu część osoby niezalogowanej. <br>
1.	Istnieje tutaj formularz rejestracji. Jest on podzielony na pola niezbędne do przejścia rejestracji oraz pole opcjonalne, które użytkownik może zmienić i dodać po założeniu konta w swoim profilu użytkownika. <br> Jest tutaj obsługa błędów takich jak uniemożliwienie rejestracji bez podania wymaganych danych, uniemożliwienie rejestracji dla powielonego loginu, numer indeksu musi składać się tylko z cyfr oraz hasła muszą mieć od 4 do 30 znaków oraz muszą się zgadzać. <br> Kiedy się zarejestrujemy możemy przejść do logowania. <br><br>
Osoba zalogowana: <br>
1. Przeglądać i wyszukiwać dzieła (rezerwacja) <br> <br>
2. Wyszukiwać wydawnictwa <br>
3. Przeglądać swoje rezerwacje (anulowanie) <br>
4. Dokonać prostej edycji profilu <br>
5. wylogować się <br>
