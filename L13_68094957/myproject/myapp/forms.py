from django import forms
from .models import Person

class PersonForm(forms.ModelForm):
    class Meta:
        model = Person
        fields = ['name', 'age']
        widgets = {
            'name': forms.TextInput(attrs={
                'class': 'form-control',
                'placeholder': 'กรุณากรอกชื่อ-นามสกุล'
            }),
            'age': forms.NumberInput(attrs={
                'class': 'form-control',
                'placeholder': 'กรอกอายุเป็นตัวเลข'
            }),
        }