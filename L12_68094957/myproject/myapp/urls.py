from django.urls import path
from myapp import views


urlpatterns = [
    path('', views.index, name='index'),
    path('about/', views.about, name='about'),
    path('form/', views.form, name='form'),
    path('contact/', views.contact, name='contact'), 
    path('results/', views.results, name='results'),
    path('results/edit/<int:pk>/', views.edit_person, name='edit_person'),
    path('results/delete/<int:pk>/', views.delete_person, name='delete_person'),
]