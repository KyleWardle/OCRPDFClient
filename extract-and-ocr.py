import pikepdf
import sys
import os
import ocrmypdf

file_id = sys.argv[1]
uploaded_file = 'uploads/' + file_id + '.pdf'
trimmed_file = 'trimmed/' + file_id + '.pdf'
with pikepdf.open(uploaded_file) as pdf:
    num_pages = len(pdf.pages)

    while num_pages > 2:
        print(num_pages)
        num_pages = num_pages - 1
        del pdf.pages[num_pages]

    pdf.save(trimmed_file)

# os.remove(uploaded_file)

print("do ocr")
output = os.popen('ocrmypdf --force-ocr --sidecar output/'+ file_id + '.txt ' + trimmed_file + ' temp.pdf').read()

# output = ocrmypdf.ocr(trimmed_file, 'temp.pdf', sidecar = 'output/'+ file_id + '.txt', force_ocr=True)
print(output)