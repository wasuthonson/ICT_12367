from django.db import models

class Person(models.Model):
    name = models.CharField(max_length=100, verbose_name='ชื่อประชากร')
    age = models.IntegerField(verbose_name='อายุ')
    created_at = models.DateTimeField(auto_now_add=True, verbose_name='วันที่เพิ่มข้อมูล', null=True, blank=True)

    def __str__(self):
        return self.name
