arr = "abcdefghijklmnopqrstuvwxyz"

key = 3
plain ="the die has been cast"
ci="";

for c in plain:
    if c.isalpha() :ci+=arr[(arr.index(c)+3) % 26]
    else: ci+=c

print(ci)
