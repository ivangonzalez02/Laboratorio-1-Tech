# Condicionales: Determinar si un número es par o impar
numero = int(input("Introduce un número: "))
if numero % 2 == 0:
    print("El número es par.")
else:
    print("El número es impar.")

# Bucle for: Iterar sobre una lista e imprimir los cuadrados de los números
numeros = [1, 2, 3, 4, 5]
for n in numeros:
    print(f"El cuadrado de {n} es {n**2}")

# Bucle while: Solicitar repetidamente la entrada hasta que el usuario introduzca '0'
entrada = ""
while entrada != "0":
    entrada = input("Introduce un número (0 para salir): ")
    print(f"Has introducido: {entrada}")
