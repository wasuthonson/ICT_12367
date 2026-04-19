from django.shortcuts import render, redirect
from django.db.models import Q
from .forms import PersonForm
from .models import Person

def index(request):
    persons = Person.objects.all()
    return render(request, 'index.html', {'persons': persons})

def about(request):
    return render(request, 'about.html')

def form(request):
    if request.method == 'POST':
        form = PersonForm(request.POST)
        if form.is_valid():
            form.save()
            return redirect('results')
    else:
        form = PersonForm()
    return render(request, 'form.html', {'form': form})

def contact(request):
    return render(request, 'contact.html')

def results(request):
    # 1. ดึงข้อมูลประชากรทั้งหมดมาก่อน (กรณีที่ยังไม่ได้ค้นหา)
    all_Person = Person.objects.all().order_by('-created_at')

    # 2. รับค่าคำค้นหาจากช่องค้นหา (name="q")
    query = request.GET.get('q')

    # 3. ตรวจสอบว่ามีค่าค้นหาถูกพิมพ์ส่งมาหรือไม่
    if query:
        # ถ้ามีค่าค้นหา ให้นำ all_Person มากรองข้อมูลเฉพาะคนที่ชื่อตรงกับคำค้นหา
        all_Person = all_Person.filter(name__icontains=query)

    # 4. ส่งข้อมูลไปแสดงผลที่ template (ถ้าไม่มี query ก็จะแสดงทั้งหมดตามข้อ 1)
    return render(request, 'results.html', {'all_person': all_Person})


def edit_person(request, pk):
    person = Person.objects.get(pk=pk)
    if request.method == 'POST':
        form = PersonForm(request.POST, instance=person)
        if form.is_valid():
            form.save()
            return redirect('results')
    else:
        form = PersonForm(instance=person)
    return render(request, 'form.html', {'form': form, 'edit_mode': True})


def delete_person(request, pk):
    person = Person.objects.get(pk=pk)
    if request.method == 'POST':
        person.delete()
        return redirect('results')
    return render(request, 'confirm_delete.html', {'person': person}) 

