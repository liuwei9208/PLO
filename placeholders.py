 
import os, zlib, struct, re, glob

def make_png(w=400, h=300):
    def chunk(name, data):
        c = zlib.crc32(name + data) & 0xffffffff
        return struct.pack('>I', len(data)) + name + data + struct.pack('>I', c)
    raw = b''.join(b'\x00' + bytes([180,180,180]*w) for _ in range(h))
    return (b'\x89PNG\r\n\x1a\n' +
            chunk(b'IHDR', struct.pack('>IIBBBBB', w, h, 8, 2, 0, 0, 0)) +
            chunk(b'IDAT', zlib.compress(raw)) +
            chunk(b'IEND', b''))

png = make_png()
paths = set()

for filepath in glob.glob('resources/views/**/*.blade.php', recursive=True):
    with open(filepath, 'r', errors='ignore') as f:
        content = f.read()
    for match in re.findall(r"assets/img[^'\"]*\.\w+", content):
        paths.add(match)

count = 0
for p in paths:
    full = os.path.join('public', p)
    os.makedirs(os.path.dirname(full), exist_ok=True)
    with open(full, 'wb') as f:
        f.write(png)
    count += 1

print('Done! Written ' + str(count) + ' placeholder images')
 