import requests

def main():
    url = "http://challenge.beginner-sqli.m1z0r3.ctf.ryotosaito.com/tutorial8/index.php?username="
    flag = ""

    # Length prediction
    length = 1
    print()
    while True:
        # Hint: You want to know the length of the password
        query = "INSERT YOUR QUERY HERE"
        print("\033[A" + str(length))
        if "already" in requests.get(url+query).text:
            # If query returnes true
            break
        length += 1

    print("Length of password is " + str(length) + "!!")

    # Password prediction
    chars = "!\\\"#$%&()*+,-./0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[]_abcdefghijklmnopqrstuvwxyz{}"

    for flag_index in range(length):
        chars_index = 0
        print()
        while True:
            # linear search
            # Hint: You want to know if chars[char_index] is correctly 'flag_index'th char of password
            query = "INSERT YOUR QUERY HERE, BE CAREFUL flag_index IS 0-INDEXED AND SQLITE STRING IS 1-INDEXED"
            print("\033[A" + str(chars[chars_index]))
            if "already" in requests.get(url+query).text:
                # If query returnes true
                flag += chars[chars_index]
                break
            else:
                chars_index += 1
        print(flag)

if __name__ == '__main__':
    main()
