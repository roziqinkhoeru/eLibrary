<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Officer;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $students = Student::all()->pluck('nis')->toArray();
        $books = Book::all()->pluck('id')->toArray();
        $officer = Officer::first()->pluck('nip')->toArray();

        $start_date = $this->faker->dateTimeBetween('-1 month', 'now');
        $end_date = $this->faker->dateTimeBetween('now', '+1 month');
        $return_date = $this->faker->dateTimeBetween('now', '+1 month');
        $status = 'kembali';

        if ($return_date > $end_date) {
            $penalty = $end_date->diff($return_date)->days * 2000;
        } else if ($end_date->diff($return_date)->days < 7) {
            $return_date = null;
            $status = 'pinjam';
        }

        return [
            'student_id' => $this->faker->randomElement($students),
            'book_id' => $this->faker->randomElement($books),
            'officer_id' => $this->faker->randomElement($officer),
            'start_date' => $start_date,
            'end_date' => $end_date,
            'return_date' => $return_date,
            'status' => $status,
            'penalty' => $penalty ?? 0,
        ];
    }
}
