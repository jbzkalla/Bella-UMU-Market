import os

replacements = {
    'Ghuri': 'Bella Market',
    '৳': 'UGX ',
    'BDT': 'UGX',
    'TK': 'UGX'
}

def replace_in_file(filepath):
    try:
        content = None
        for encoding in ['utf-8', 'latin-1', 'cp1252']:
            try:
                with open(filepath, 'r', encoding=encoding) as f:
                    content = f.read()
                current_encoding = encoding
                break
            except UnicodeDecodeError:
                continue
        
        if content is None:
            print(f"Could not decode {filepath}")
            return

        new_content = content
        for old, new in replacements.items():
            new_content = new_content.replace(old, new)
            
        if content != new_content:
            with open(filepath, 'w', encoding=current_encoding) as f:
                f.write(new_content)
            print(f"Updated: {filepath}")
    except Exception as e:
        print(f"Error in {filepath}: {e}")

root_dir = r'c:\xampp\htdocs\bella\E-Market-Place'
extensions = ('.php', '.js', '.css')

for root, _, files in os.walk(root_dir):
    for name in files:
        if name.endswith(extensions):
            replace_in_file(os.path.join(root, name))
