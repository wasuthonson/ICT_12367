from django.shortcuts import render, redirect
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
    persons = Person.objects.all().order_by('-created_at')
    return render(request, 'results.html', {'persons': persons})


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

