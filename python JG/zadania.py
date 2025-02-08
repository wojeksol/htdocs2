# # Zadanie 1

# a = int(input('Wprowadź pierwszą liczbę\n'));
# b = int(input('Wprowadź drugą liczbę\n'));


# suma = a + b;
# print('Suma: ', suma  ,' \n');
# różnica = a - b;
# print('Różnica: ', różnica  ,' \n');
# iloczyn = a * b;
# print('Iloczyn: ', iloczyn, ' \n');
# iloraz = a / b;
# print('Iloraz: ', iloraz, ' \n');


# # Zadanie 2


# imie = str(input('Podaj swoje imię\n'));
# nazwisko = str(input('Podaj swoje nazwisko\n'));
# miejscowosc = str(input('Podaj swoją miejscowość\n'));
# ulica = str(input('Podaj swoją ulicę\n'));
# numer = str(input('Podaj swój numer domu\n'));
# print(imie, nazwisko, '\n');
# print('ul. ', ulica, numer, '\n');
# print('miejscowość: ',miejscowosc, '\n');

# # Zadanie 3

# wzrost = float(input('Podaj swój wzrost w cm\n'));
# wzrost = wzrost / 100;

# waga = float(input('Podaj swoją wagę w kg\n'));

# BMI = waga / (wzrost ** 2);

# BMI = round(BMI, 2);

# print('Twoje BMI wynosi: ', BMI, '\n');

# # Zadanie 4

# euro = float(input('Podaj kwotę w euro: '));
# print(euro, 'euro to ', round(euro * 4.24, 2), 'złotych\n');

# # Zadanie 5

# wiek = int(input('Podaj swój wiek: '));
# print('Za 10 lat będziesz miał: ', wiek + 10, 'lat\n');

# ## Instrukcje warunkowe

# a = float(input('Podaj pierwszą liczbę: '));
# b = float(input('Podaj drugą liczbę: '));

# if a > b:
#     print('Liczba ', a, 'jest większa od liczby ', b);
# else:
#     print('Liczba ', b, 'jest większa od liczby ', a);

# number = int(input('Podaj liczbę: '));

# if number == 40:
#     print('Liczba jest równa 40\n');
# elif number == 20:
#     print('Liczba jest równa 20\n');
# elif number == 30:
#     print('Liczba jest równa 30\n');
# else:
#     print('Liczba nie jest równa 40 20 ani 30\n');

# number = int(21);

# print('Liczba jest równa 21') if number == 21 else print('Liczba nie jest równa 21');

# a = int(20);
# b = int(30);

# print('Liczba A równa 20, Liczba B równa 30') if a == 20 and b == 30 else print('Liczba A nie równa 20, liczba B nie równa 30');

# print('Liczba A równa 20 natomiast Liczba B różna od 30') if a == 20 or b == 30 else print(); 

# a = float(input('podaj Liczbe A: '))

# if a == 20:
#     print('Liczba A = 20')
#     if a == 30:
#         print('Liczba A = 30')
#     else:
#         print(':)')

# # Zadanie 1

# password = str(input('Podaj hasło: '))

# print('Hasło jest poprawne') if password == 'haslo' else print('Hasło nie jest poprawwne')

# # Zadanie2 

# a = int(input('Podaj liczbe A: '))
# b = int(input('Podaj liczbe B: '))
# c = int(input('Podaj liczbe C: '))
# d = int(input('Podaj liczbe D: '))
# e = int(input('Podaj liczbe E: '))
# f = int(input('Podaj liczbe F: '))

# suma = a + b + c +d + e + f;

# print('Suma jest większa lub równa 30') if suma > 30 else print('Suma nie przekracza 30')

# # Zadanie 3

# print('Program z czyta czy liczba którą użytkownik poda jest dodatnia czy ujemna albo równa zero')

# a = int(input('Podaj liczbę całkowitą: '))

# if a > 0:
#     print('Liczba',a,'jest liczbą dodatnią')
# elif a == 0:
#     print('Liczba',a,'jest zerem')
# else:
#     print('Liczba',a,'jest liczbą ujemną')

# # Zadannie 4

# punkt = int(input('Podaj ilośc punktów: '))

# if punkt < 0:
#     print('niepoprawna liczba punkt')
# elif punkt <= 50:
#     print('Twoja ocena to 2')
# elif punkt <= 70:
#     print('Twwoja ocena to 3')
# elif punkt <= 90:
#     print('Twoja ocena to 4')
# elif punkt <= 100:
#     print('Twoja ocena to 5')
# else:
#     print('niepoprawna liczba punktów')

# # Zadanie 5

# a, b = int(input('Podaj liczbę A: ')), int(input('Podaj Liczbe B: '))

# print('liczba',a,'jest większa od liczby',b) if a > b else print('liczba',b,'jest większa od liczby',a)

# x = max(a,b)

# print('liczba',x,'jest większa')

# # Zadanie 6

# x = int(input('Podaj liczbe egzemplarzem książki: '))

# if x < 0:
#     print('Błąd')
# elif x < 500:
#     print('Koszt druku wynosi 15 zł')
# elif x < 1000:
#     print('Koszt druku wynosi 12 zł')
# else:
#     print('Koszt druku wynosi 10 zł')    

# # Zadanie 7

# x = float(input('Podaj liczbe kilometrów: '))

# y = float(10)

# z = float(1)


# if x < 0:
#     print('BŁĄD')
# elif x <= 10:
#     print('Cena to 20 zł')
# elif x <= 30:
#     print('Cena to ',y + 0.1*x,' zł')
# else:
#     print('Cena to ',z + 0.08*x,' zł')

# # Zadanie 8

# x = int(input('Podaj dnień tygodnia liczbowo: '))

# if x < 0:
#     print("BŁĄD")
# elif x == 0:
#     print('We niedziele urząd jest nie czyny.')
# elif x == 1:
#     print('We poniedziałek urząd jest czyny od 10.00 do 14.00')
# elif x == 2:
#     print('We wtorek urząd jest czyny od 10.00 do 19.00')    
# elif x == 3 or x == 4 or x == 5:
#     print('We środę do piątku urząd jest czyny od 11.00 do 16.00')
# elif x == 6:
#     print('W sobotę urząd nie jest czyny')
# else:
#     print('BŁĄD')

# # Zadanie 9

# x, y, z = int(input('Podaj liczbę X: ')), int(input('Podaj liczbę Y: ')), int(input('Podaj liczbę Z: '))

# if x % 2 == 0 and y % 2 == 0 and z % 2 == 0:
#     print('Wszystkie liczby są parzyste')
# else:
#     print('Nie wszystkie liczby są parzyste')

# # Zadanie 10

# x, y, z = input('Podaj ciąg znaków: '), input('Podaj ciąg znaków: '), input('Podaj ciąg znaków: ')

# if x == '' or y == '' or z == '':
#     print('Minimum jednen z ciągów jest pusty')
# else:
#     print('Żaden z ciągów nie jest pusty')


# # Zadanie 11

# arraylength, array = int(input('Podaj długość ciągu znaków: ')), str(input('Podaj ciąg znaków: ')) 

# if len (array) < arraylength:
#     print('Ciąg jest za krótki')
# elif len(array) > arraylength:
#     print('Ciąg jest za długi')
# else:
#     print('Ciąg ma odpowiednią długość')


# # Zadanie 12

x, y = int(input('Podaj lizcbe dób hotelowych: ')), int(input('Podaj liczbę osób: '))
suma = 0;


if x <= 0:
    print('BŁĄD')
elif x < 4:
    print('Koszt pobytu wynosi 100 zł')
    suma = int(100);
elif x <= 7:
    print('Koszt pobytu wynosi 75 zł')
    suma = int(75);
else:
    print('Koszt pobytu wynosi 50 zł')
    suma = int(50);

print("Cena dla ",y,"osób wynosi: ",suma*y,"zł")




