with open("insert_statements.sql", "w") as file:
    file.write("INSERT INTO admin (login, pass, id_uczen, id_nauczyciel) VALUES\n")

    # Pętla generująca zestaw od u001 do u500
    for i in range(1, 501):
        id_str = f"u{i:02}"
        row = f"('{id_str}', '{id_str}', {i}, NULL)"
        
        # Dodajemy przecinek po każdym wpisie oprócz ostatniego
        if i < 500:
            file.write(row + ",\n")
        else:
            file.write(row + ";\n")

print("Plik SQL został wygenerowany jako 'insert_statements.sql'")


